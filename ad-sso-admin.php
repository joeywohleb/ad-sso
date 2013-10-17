
<div class="wrap">  
    <?php    echo "<h2>" . __( 'Active Directory Single Sign On Settings', 'ad_sso_trdom' ) . "</h2>"; ?>  
    <?php  
     
    if($_POST['ad_sso_hidden'] == 'Y') {  
        //Form data sent  
        $domain = $_POST['ad_sso_fqdn'];  
        update_option('ad_sso_fqdn', $fqdn);  
          
        $ou = $_POST['ad_sso_ou'];  
        update_option('ad_sso_ou', $ou);  
          
        $username = $_POST['ad_sso_username'];  
        update_option('ad_sso_username', $username);  
          
        $password = $_POST['ad_sso_password'];  
        update_option('ad_sso_password', $password);  

        $domain = $_POST['ad_sso_domain'];  
        update_option('ad_sso_domain', $domain);  
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php  
    } else {  
        //Normal page display  
        $fqdn = get_option('ad_sso_fqdn');  
        $ou = get_option('ad_sso_ou');  
        $username = get_option('ad_sso_username');  
        $password = get_option('ad_sso_password');
        $domain = get_option('ad_sso_domain');  
    }  
?>   
    <form name="ad_sso_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="ad_sso_hidden" value="Y">  
        <?php    echo "<h4>" . __( 'Active Directory Search Settings', 'ad_sso_trdom' ) . "</h4>"; ?>  
        <p><?php _e("Fully Qualified Domain: " ); ?><input type="text" name="ad_sso_fqdn" value="<?php echo $fqdn; ?>" size="20"><?php _e(" ex: sub.domain.com" ); ?></p>  
        <p><?php _e("OU: " ); ?><input type="text" name="ad_sso_ou" value="<?php echo $ou; ?>" size="20"><?php _e(" ex: DC=sub,DC=domain,DC=com" ); ?></p>  
        <hr />   
        <?php    echo "<h4>" . __( ' Read-Only Service Account Settings', 'ad_sso_trdom' ) . "</h4>"; ?>  
        <p><?php _e("Username: " ); ?><input type="text" name="ad_sso_username" value="<?php echo $username; ?>" size="20"><?php _e(" ex: serviceaccount " ); ?></p>  
        <p><?php _e("Password: " ); ?><input type="password" name="ad_sso_password" value="<?php echo $password; ?>" size="20"><?php _e(" ex: secretpassword " ); ?></p>  
        <p><?php _e("Domain: " ); ?><input type="text" name="ad_sso_domain" value="<?php echo $domain; ?>" size="20"><?php _e(" ex: sub from sub\serviceaccount " ); ?></p> 
          
      
        <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'ad_sso_trdom' ) ?>" />  
        </p>  
    </form>  
</div>  