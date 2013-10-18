<?php

	function ad_sso_get_user_id( $userid ) { 
		$user = get_userdatabylogin( $userid );
		return $user->ID;
	}

	function ad_sso_register_user( $domain, $userid ) {

        $ad_sso_fqdn = get_option('ad_sso_fqdn');  
        $ad_sso_ou = get_option('ad_sso_ou');  
        $ad_sso_username = get_option('ad_sso_username');  
        $ad_sso_password = get_option('ad_sso_password');
        $ad_sso_domain = get_option('ad_sso_domain');  

		$ldapCred = $ad_sso_username . '@' . $ad_sso_fqdn; 
		$connection = ldap_connect('ldap://' . $ad_sso_fqdn) or die('Error: Could not connect to Domain!'); 				
		//Set some variables
		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
		ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);		 
		//Bind to the ldap directory
		$bind = ldap_bind($connection, $ldapCred, $ad_sso_password) or die("Error: Couldn't bind to Active Directory!");
		//Search the directory
		$result = ldap_search($connection, $ad_sso_ou, '(samaccountname=' . $userid . ')');
		//Create result set
		$entries = ldap_get_entries($connection, $result);	

		$email = $entries[0]["mail"][0];
		$givenname = $entries[0]["givenname"][0];
		$sn = $entries[0]["sn"][0];

		if ( empty($email) ) {
			$email = $userid . '@' . $ad_sso_fqdn;
		}

		$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
		$user_id = wp_create_user( $userid, $random_password, $email );
		
		wp_update_user( array ( 'ID' => ad_sso_get_user_id( $userid ), 'first_name' => $givenname, 'last_name' => $sn, 'show_admin_bar_front' => 'false', 'display_name' =>  $givenname . ' ' . $sn, 'role' => 'subscriber') );
	}

	/*	Get domain and username of user	*/
	$cred = explode('\\', $_SERVER['REMOTE_USER']);
	/*	seperate domain and user variables	*/
	list($ad_sso_local_domain,, $ad_sso_local_userid) = $cred;
	if ( is_user_logged_in() ) {
		global $current_user;
  		get_currentuserinfo();
  		if ( !(strtolower(trim($current_user->user_login)) === strtolower(trim($ad_sso_local_userid)))) {
  			wp_logout();
  		}
	}

	if ( !is_user_logged_in() ) {
		if (username_exists( $ad_sso_local_userid )) {
			$user_id = ad_sso_get_user_id( $ad_sso_local_userid );
			wp_set_current_user($user_id, $ad_sso_local_userid);
			wp_set_auth_cookie($user_id);
			do_action('wp_login', $ad_sso_local_userid);
		} else {
			ad_sso_register_user($ad_sso_local_domain, $ad_sso_local_userid);
		}
	}
	
?>