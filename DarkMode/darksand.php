<?php
/**
 * Plugin Name: darksand-plugin
 * Plugin URI: richterhansen.dk/sand-kommunikation/
 * Description: SandKommunikation.
 * Version: 0.2
 * Author: melledodo
 * Author URI: richterhansen.dk/sand-kommunikation/
 */

// Sørg for, at filen ikke køres direkte.
if ( !defined('ABSPATH') ) {
    exit;
}
add_action('admin_notices', 'my_first_plugin_notice'); 

function my_first_plugin_notice() { 
    ?> 
    <div class="notice notice-success is-dismissible"> 
    <p><?php _e('Motherfucker is activated and working!', 'my-first-plugin'); ?></p> 
    </div> 
    <?php 
    } 

// Tilføj dark mode CSS
function darksand_enqueue_darkmode_css() {
    wp_enqueue_style(
        'darksand-darkmode',
        plugin_dir_url(__FILE__) . 'dark-mode.css' 
    );

    // Tving browseren til at hente den nyeste version af style.css
    wp_enqueue_style(
        'custom-style', 
        plugin_dir_url(__FILE__) . 'style.css', 
        [], // Afhængigheder (ingen afhængigheder).
        '1.0.1' // Versionsnummer for at tvinge browseren til at hente den nyeste version.
    );
}
add_action('wp_enqueue_scripts', 'darksand_enqueue_darkmode_css');

// Tilføj en knap til at slå dark mode til og fra
function darksand_add_darkmode_toggle() {
    echo '<button id="darksand-toggle" style="position: fixed; bottom: 20px; right: 20px; padding: 10px 20px; z-index: 1000;">🌙 Dark Mode</button>';
}
add_action('wp_footer', 'darksand_add_darkmode_toggle');

// Tilføj JavaScript til dark mode-toggle
function darksand_enqueue_darkmode_js() {
    wp_enqueue_script(
        'darksand-darkmode-js', 
        plugin_dir_url(__FILE__) . 'dark-mode.js', 
        array('jquery'), // Afhængigheder (her jQuery).
        false,
        true 
    );
}
add_action('wp_enqueue_scripts', 'darksand_enqueue_darkmode_js');
?>
