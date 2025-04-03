<?php
function moje_sablona_setup() {
    register_nav_menus(array(
        'primary' => __('Hlavní menu', 'moje-sablona')
    ));
}
add_action('after_setup_theme', 'moje_sablona_setup');

function moje_sablona_scripty() {
    wp_enqueue_style('moje-sablona-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'moje_sablona_scripty');
?>