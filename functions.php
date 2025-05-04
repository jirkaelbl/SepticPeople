<?php

// add_action('after_setup_theme', 'moje_sablona_setup');

// function moje_sablona_scripty() {
//     wp_enqueue_style('moje-sablona-style', get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts', 'moje_sablona_scripty');

/* DATUM KONÁNÍ KONCERTU */
function pridat_metabox_koncert_datum() {
    global $post;

    if (!isset($post) || get_post_type($post) !== 'page') return;

    $template = get_page_template_slug($post->ID);

    if ($template === 'koncertDetail-page.php') {
        add_meta_box(
            'koncert_datum_metabox',
            'Datum a čas koncertu',
            'zobrazit_input_koncert_datum',
            'page',
            'normal',
            'default'
        );
    }
}
add_action('add_meta_boxes', 'pridat_metabox_koncert_datum');

function zobrazit_input_koncert_datum($post) {
    $hodnota = get_post_meta($post->ID, '_koncert_datum', true);
    $value = '';

    if (!empty($hodnota)) {
        // Převod z uloženého formátu na HTML5 validní (Y-m-d\TH:i)
        $timestamp = strtotime($hodnota);
        $value = date('Y-m-d\TH:i', $timestamp);
    }

    echo '<input type="datetime-local" name="koncert_datum" value="' . esc_attr($value) . '" style="width: 100%;">';
}

function ulozit_koncert_datum($post_id) {
    if (isset($_POST['koncert_datum'])) {
        $datetime = sanitize_text_field($_POST['koncert_datum']);
        // Uložíme jako formát: Y-m-d H:i
        update_post_meta($post_id, '_koncert_datum', date('Y-m-d H:i', strtotime($datetime)));
    }
}
add_action('save_post', 'ulozit_koncert_datum');



/* MÍSTO KONÁNÍ KONCERTU */
function pridat_metabox_misto_konani() {
    global $post;

    // Ověříme, že jsme ve správném typu postu a máme post objekt
    if (!isset($post) || get_post_type($post) !== 'page') return;

    // Získáme použitou šablonu
    $template = get_page_template_slug($post->ID);

    // Pokud stránka používá konkrétní šablonu, zobrazíme metabox
    if ($template === 'koncertDetail-page.php') {
        add_meta_box(
            'misto_konani_metabox',
            'Místo konání',
            'zobrazit_input_misto_konani',
            'page',
            'normal',
            'default'
        );
    }
}
add_action('add_meta_boxes', 'pridat_metabox_misto_konani');

// Vykreslení pole
function zobrazit_input_misto_konani($post) {
    $misto = get_post_meta($post->ID, '_koncert_adresa', true);
    echo '<label for="misto_konani">Zadej místo konání koncertu:</label>';
    echo '<input type="text" id="misto_konani" name="misto_konani" value="' . esc_attr($misto) . '" style="width:100%;" />';
}

// Uložení pole
function ulozit_misto_konani($post_id) {
    if (array_key_exists('misto_konani', $_POST)) {
        update_post_meta($post_id, '_koncert_adresa', sanitize_text_field($_POST['misto_konani']));
    }
}
add_action('save_post', 'ulozit_misto_konani');





/* VELIKOSTI U PRODUKTU */
function metabox_pro_velikosti() {
    global $post;
    // Získáme použitou šablonu
    if ($post instanceof WP_Post && !empty($post->ID)) {
        $template = get_page_template_slug($post->ID);

        // Pokud stránka používá konkrétní šablonu, zobrazíme metabox
        if ($template === 'produkt-page.php') {
            add_meta_box(
                'velikosti_produktu',
                'Velikosti',
                'zobrazit_metabox_velikosti',
                'page',
                'side'
            );
        }
    }

}
add_action('add_meta_boxes', 'metabox_pro_velikosti');

function zobrazit_metabox_velikosti($post) {
    $moznosti = ['S', 'M', 'L', 'XL', 'XXL', 'OS'];
    $vybrane = get_post_meta($post->ID, '_velikosti_produktu', true);
    if (!is_array($vybrane)) $vybrane = [];

    foreach ($moznosti as $velikost) {
        $checked = in_array($velikost, $vybrane) ? 'checked' : '';
        echo "<label><input type='checkbox' name='velikosti_produktu[]' value='$velikost' $checked> $velikost</label><br>";
    }
}

function ulozit_velikosti_produktu($post_id) {
    if (isset($_POST['velikosti_produktu'])) {
        $vybrane = array_map('sanitize_text_field', $_POST['velikosti_produktu']);
        update_post_meta($post_id, '_velikosti_produktu', $vybrane);
    } else {
        delete_post_meta($post_id, '_velikosti_produktu');
    }
}
add_action('save_post', 'ulozit_velikosti_produktu');



/* OBRÁZKY DETAIL PRODUTKU */
// Pole pro více obrázků
function metabox_pro_obrazky($post) {
    global $post;
    // Získáme použitou šablonu
    if ($post instanceof WP_Post && !empty($post->ID)) {
        $template = get_page_template_slug($post->ID);

        // Pokud stránka používá konkrétní šablonu, zobrazíme metabox
        if ($template === 'produkt-page.php') {
            add_meta_box(
                'obrazky_produktu',
                'Obrázky produktu (více)',
                'zobrazit_metabox_obrazky',
                'page',
                'normal',
                'default'
            );
        }
    }
}
add_action('add_meta_boxes', 'metabox_pro_obrazky');

function zobrazit_metabox_obrazky($post) {
    $image_ids = get_post_meta($post->ID, '_obrazky_produktu', true);
    if (!is_array($image_ids)) $image_ids = [];

    echo '<div id="obrazky-produkty-wrap">';
    foreach ($image_ids as $id) {
        echo wp_get_attachment_image($id, 'thumbnail');
        echo '<input type="hidden" name="obrazky_produktu[]" value="' . esc_attr($id) . '">';
    }
    echo '</div>';
    echo '<button type="button" class="button" id="pridat-obrazek">Přidat obrázek</button>';

    // JS pro výběr obrázků
    ?>
    <script>
        jQuery(document).ready(function($) {
            $('#pridat-obrazek').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: 'Vyber obrázky',
                    multiple: true
                }).on('select', function() {
                    var selection = custom_uploader.state().get('selection');
                    selection.map(function(file) {
                        $('#obrazky-produkty-wrap').append(
                            '<input type="hidden" name="obrazky_produktu[]" value="' + file.id + '">' +
                            '<img src="' + file.attributes.url + '" style="max-width:100px;margin:5px;">'
                        );
                    });
                }).open();
            });
        });
    </script>
    <?php
}

function ulozit_obrazky_produktu($post_id) {
    if (isset($_POST['obrazky_produktu'])) {
        $ids = array_map('intval', $_POST['obrazky_produktu']);
        update_post_meta($post_id, '_obrazky_produktu', $ids);
    }
}
add_action('save_post', 'ulozit_obrazky_produktu');



/* CENA DEAIL PRODUKTU */
// Přidání vlastního metaboxu pro stránku (např. cena)
function pridat_metabox_pro_cenu() {
    global $post;

    // Ověření, že pracujeme s editací stránky
    if (isset($post)) {
        $template = get_page_template_slug($post->ID);

        // Zobrazit metabox jen pro šablonu 'nazevSablony.php'
        if ($template === 'produkt-page.php') {
            add_meta_box(
                'cena_metabox',
                'Cena produktu',
                'zobrazit_cenu_input',
                'page',
                'side',
                'default'
            );
        }
    }
}
add_action('add_meta_boxes', 'pridat_metabox_pro_cenu');


// Obsah metaboxu
function zobrazit_cenu_input($post) {
    $cena = get_post_meta($post->ID, '_cena_produktu', true);
    ?>
    <label for="cena_produktu">Zadej cenu produktu v Kč:</label>
    <input type="text" name="cena_produktu" id="cena_produktu" value="<?php echo esc_attr($cena); ?>" style="width: 100%;" />
    <?php
}

// Uložení ceny
function ulozit_cenu_input($post_id) {
    if (array_key_exists('cena_produktu', $_POST)) {
        update_post_meta(
            $post_id,
            '_cena_produktu',
            sanitize_text_field($_POST['cena_produktu'])
        );
    }
}
add_action('save_post', 'ulozit_cenu_input');



add_theme_support('title-tag');
add_theme_support('post-thumbnails', ['post', 'page']);

function custom_theme_setup() {
    register_nav_menus(array(
        'main_menu' => __('Hlavní menu', 'textdomain'), // Registrování hlavního menu
    ));
}
add_action('after_setup_theme', 'custom_theme_setup');




add_action( 'wp_enqueue_scripts', 'wpdocs_my_enqueue_scripts' );
function wpdocs_my_enqueue_scripts() : void {
    // Enqueue my styles.
    wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@next/dist/aos.css' );
    wp_enqueue_style( 'animate-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );

    // Enqueue your main style (this will be used for inline styles).
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );

    // Scripts
    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' );
    wp_enqueue_script( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js' );
}

// VYTAŽENO VEN:
add_action('wp_enqueue_scripts', 'custom_fonts_styles');
function custom_fonts_styles() {
    $font_url1 = get_template_directory_uri() . '/assets/font_winky_sans/static/WinkySans-Regular.ttf';
    $font_url2 = get_template_directory_uri() . '/assets/font_winky_sans/static/DirtyBoy.ttf';

    $custom_css = "
        @font-face {
            font-family: 'WinkySans';
            src: url('$font_url1') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'DirtyBoy';
            src: url('$font_url2') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'WinkySans', sans-serif;
        }

        .hero-text h1 {
            font-family: 'DirtyBoy', sans-serif;
        }
    ";

    wp_add_inline_style('main-style', $custom_css);
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

/////////////////////////////////////////////////

    $wp_customize->add_section('main_menu_section', array(
        'title' => 'Header',
        'priority' => 20,
        'description' => 'Nastavení pro Hlavní menu',
    ));

    $wp_customize->add_setting('menu_background_color', array(
        'default' => '#ffffff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'menu_background_color',
        array(
            'label' => 'Barva pozadí hlavního menu',
            'section' => 'main_menu_section',
            'settings' => 'menu_background_color',
        )
    ));

/////////////////////////////////////////////////
}


add_theme_support( 'post-thumbnails', array( 'post' ) );

add_theme_support('title-tag');

add_filter('document_title_parts', 'upravit_muj_title');

function upravit_muj_title($title) {

    unset($title['site']);

    if (is_front_page()) {
        $title['title'] = 'SP | Home';
    } else {
        $title['title'] = 'SP | ' . $title['title'];
    }

    return $title;
}


?>