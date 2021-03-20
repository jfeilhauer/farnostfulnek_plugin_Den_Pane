<?php
add_action('admin_menu', 'ohlasky_menu');

function ohlasky_menu(){
    // string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null
    add_menu_page( 
      'Ohlášky', 
      'Ohlášky', 
      'edit_posts', 
      'ohlasky_page', 
      'ohlasky_page_generate', 
      'dashicons-media-text', 
      5
     );
    // string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null
    add_submenu_page( 
        'ohlasky_page', 
        'Den Páně', 
        'Den Páně', 
        'edit_posts', 
        'den_pane', 
        'den_pane_generate' 
    );
}
function ohlasky_page_generate(){
    wp_enqueue_style('ohlasky', plugin_dir_url(__FILE__).'css/ohlasky.css', array(), 	$ver = null);
    include 'page/ohlasky_admin.phtml';  
}
function den_pane_generate(){
    wp_enqueue_style('ohlasky', plugin_dir_url(__FILE__).'css/ohlasky.css', array(), 	$ver = null);
    wp_enqueue_script('den_pane', plugin_dir_url(__FILE__).'den_pane.js', array(), $ver = null, true);
    include 'page/den_pane_admin.phtml';
}
?>