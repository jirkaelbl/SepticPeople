<?php

// add_action('after_setup_theme', 'moje_sablona_setup');

// function moje_sablona_scripty() {
//     wp_enqueue_style('moje-sablona-style', get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts', 'moje_sablona_scripty');



add_theme_support('title-tag');

add_action( 'wp_enqueue_scripts', 'wpdocs_my_enqueue_scripts' );
function wpdocs_my_enqueue_scripts() : void {
    // Enqueue my styles.
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css', true);
    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@next/dist/aos.css' );
    // wp_enqueue_style( 'owl-carousel-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
    wp_enqueue_style( 'animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );

    // Enqueue my scripts.
    // wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );
    // wp_enqueue_script( 'navigace', get_template_directory_uri() . '/js/nav.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' );
    wp_enqueue_script( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js' );

}

add_action('init', 'udelej_menu');
function udelej_menu(){
    $locations = array(
        'hlavni' => 'Primární menu v header'
    );

    register_nav_menus($locations);
}



// CUSTOMIZER
add_action('customize_register', 'customizer');
function customizer($wp_customize){
    $wp_customize->add_section('footer', array(
        'title' => 'Footer',
        'priority' => 10,
        'description' => 'Informace o footeru',
    ));

    $wp_customize->add_setting('popis', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('popis', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'footer',
        'label' => 'Popis'
    ));

}


add_theme_support( 'post-thumbnails', array( 'post' ) );
?>