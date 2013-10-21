
<div class="wrap">  
    <?php    echo "<h2>" . __( 'Active Directory Single Sign On Settings', 'ad_sso_trdom' ) . "</h2>"; ?>  
    <?php  
     
    if($_POST['ad_sso_hidden'] == 'Y') {  
        //Form data sent  
        $fqdn = $_POST['ad_sso_fqdn'];  
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
        <input type="hidden" name="ad_sso_hidden" value="Y" />                      
        <h4>Active Directory Search Settings</h4>  

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_fqdn">Fully Qualified Domain</label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_fqdn" id="ad_sso_fqdn" value="<?php echo $fqdn; ?>" class="regular-text" />
                        <p class="description">ex: sub.domain.com</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_ou">Organizational Unit</label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_ou" id="ad_sso_ou" value="<?php echo $ou; ?>" class="regular-text" />
                        <p class="description">ex: DC=sub,DC=domain,DC=com</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <h4>Read-Only Service Account Settings</h4>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_username">Username</label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_username" id="ad_sso_username" value="<?php echo $username; ?>" class="regular-text" />
                        <p class="description">ex: serviceaccount</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_username">Password</label>
                    </th>
                    <td>
                        <input type="password" name="ad_sso_password" id="ad_sso_password" value="<?php echo $password; ?>" class="regular-text" />
                        <p class="description">ex: secretpassword</p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="ad_sso_domain">Domain</label>
                    </th>
                    <td>
                        <input type="text" name="ad_sso_domain" id="ad_sso_domain" value="<?php echo $domain; ?>" class="regular-text" />
                        <p class="description">ex: sub from sub\serviceaccount</p>
                    </td>
                </tr>
            </tbody>
        </table>
      
        <p class="submit">  
            <input type="submit" name="Submit" value="Update Options" class="button button-primary" />  
        </p>  
    </form>  
</div>  