<?php

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
				$user = get_userdatabylogin( $ad_sso_local_userid );
				$user_id = $user->ID;
				wp_set_current_user($user_id, $ad_sso_local_userid);
				wp_set_auth_cookie($user_id);
				do_action('wp_login', $ad_sso_local_userid);
			} else {
				/* register user */
			}
		}

	

	
?>