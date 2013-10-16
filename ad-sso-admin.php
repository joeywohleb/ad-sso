<div class="wrap">  
    <?php    echo "<h2>" . __( 'Active Directory Single Sign On Settings', 'adsso_trdom' ) . "</h2>"; ?>  
      
    <form name="adsso_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="adsso_hidden" value="Y">  
        <?php    echo "<h4>" . __( 'Active Directory Search Settings', 'adsso_trdom' ) . "</h4>"; ?>  
        <p><?php _e("Domain: " ); ?><input type="text" name="adsso_domain" value="<?php echo $domain; ?>" size="20"><?php _e(" ex: sub.domain.com" ); ?></p>  
        <p><?php _e("OU: " ); ?><input type="text" name="adsso_ou" value="<?php echo $ou; ?>" size="20"><?php _e(" ex: DC=sub,DC=domain,DC=com" ); ?></p>  
        <hr />   
        <?php    echo "<h4>" . __( ' Read-Only Service Account Settings', 'adsso_trdom' ) . "</h4>"; ?>  
        <p><?php _e("Username: " ); ?><input type="text" name="adsso_username" value="<?php echo $username; ?>" size="20"><?php _e(" ex: serviceaccount " ); ?></p>  
        <p><?php _e("Password: " ); ?><input type="text" name="adsso_password" value="<?php echo $password; ?>" size="20"><?php _e(" ex: secretpassword " ); ?></p>  
          
      
        <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'adsso_trdom' ) ?>" />  
        </p>  
    </form>  
</div>  