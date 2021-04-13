<?php
define('WP_THEME_TEXTDOMAIN', 'hakki');
define('HC_STYLESHEET_DIRECTORY_URI', get_stylesheet_directory_uri());
define('HC_TEMPLATE_DIRECTORY', get_template_directory());
define('HC_THEME_VERSION', '0.1.0');

load_theme_textdomain(WP_THEME_TEXTDOMAIN, HC_TEMPLATE_DIRECTORY . '/languages');

if ( file_exists(HC_TEMPLATE_DIRECTORY.'/admin/adminpage.php') ) {
    include_once("admin/adminpage.php");
}