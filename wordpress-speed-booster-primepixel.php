<?php
/**
 * Plugin Name:       WordPress Speed Booster – PrimePixel
 * Plugin URI:        https://www.primepixel.it/servizi/siti-web-wordpress-veloci/
 * Description:       Plugin leggero per ottimizzare PageSpeed 90+ su WordPress. Disattiva emoji, ottimizza heartbeat, rimuove query strings, abilita lazy load nativo, defer JS non critico. Realizzato da Prime Pixel – Web Agency Nerviano Milano.
 * Version:           1.0.0
 * Author:            Prime Pixel
 * Author URI:        https://www.primepixel.it
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       pp-speed-booster
 */

if (!defined('ABSPATH')) exit;

define('PP_BOOSTER_VERSION', '1.0.0');

// 1. Rimuove Emoji (risparmia 1 richiesta)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// 2. Rimuove Query Strings da CSS/JS per cache migliore
add_filter('style_loader_src', function($src){ return remove_query_arg('ver', $src); }, 15, 1);
add_filter('script_loader_src', function($src){ return remove_query_arg('ver', $src); }, 15, 1);

// 3. Disabilita Heartbeat su frontend (riduce carico CPU)
add_action('init', function(){
    if (!is_admin()) {
        wp_deregister_script('heartbeat');
    }
}, 1);

// 4. Aggiunge defer a JS non critico (esclude jQuery)
add_filter('script_loader_tag', function($tag, $handle){
    $defer_exclude = ['jquery','jquery-core','jquery-migrate'];
    if (in_array($handle, $defer_exclude)) return $tag;
    if (is_admin()) return $tag;
    return str_replace(' src', ' defer src', $tag);
}, 10, 2);

// 5. Preconnect a Google Fonts se usati
add_action('wp_head', function(){
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'."
";
}, 1);

// 6. Abilita lazy loading nativo per immagini già esistenti (compatibilità)
add_filter('wp_get_attachment_image_attributes', function($attr){
    if (!isset($attr['loading'])) $attr['loading'] = 'lazy';
    return $attr;
});
