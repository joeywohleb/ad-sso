<?php   
    /* 
    Plugin Name: Active Directory Single Sign On
    Plugin URI: https://github.com/joeywohleb/ad-sso
    Description: Wordpress plugin for implenting Single Sign On for Active Directory.
    Author: Joey Wohleb
    Version: 0.1
    Author URI: http://joeywohleb.com/
    */  

    function ad_sso_admin_actions() {  
    	add_options_page("AD SSO Settings", "AD SSO Settings", 1, "ad-sso-settings", "ad_sso_admin"); 
	} 

    function ad_sso_admin() {
    	require_once("ad-sso-admin.php");
    }

    function ad_sso_authenticte_user() {
    	require_once("ad-sso-user.php");
    } 
  
	add_action('admin_menu', 'ad_sso_admin_actions'); 
    add_action('after_setup_theme', 'ad_sso_authenticte_user' );

?>