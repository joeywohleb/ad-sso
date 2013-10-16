<?php   
    /* 
    Plugin Name: Active Directory Single Sign On
    Plugin URI: https://github.com/joeywohleb/ad-sso
    Description: Wordpress plugin for implenting Single Sign On for Active Directory.
    Author: Joey Wohleb
    Version: 0.1
    Author URI: http://joeywohleb.com/
    */  

    function adsso_admin() {
    	require_once("ad-sso-admin.php");
    }

    function adsso_admin_actions() {  
    	add_options_page("AD SSO Settings", "AD SSO Settings", 1, "ad-sso-settings", "adsso_admin"); 
	}  
  
	add_action('admin_menu', 'adsso_admin_actions'); 

?>