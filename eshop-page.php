<?php
/*
    Template name: E-shop
*/
get_header();
?>
<!--TODO: HTML kód-->
Stránka s e-shopem

<?php
$query = new WP_Query(array(
    'post_type'  => 'page',
    'meta_key'   => '_wp_page_template',
    'meta_value' => 'produkt-page.php',
    'orderby'    => 'date',
    'order'      => 'DESC',
    'posts_per_page' => -1 // Získá všechny stránky
));

if ($query->have_posts()) {
    echo '<ul>';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a> - ' . get_the_date('d.m.Y') . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Žádné produkty nebyly nalezeny.</p>';
}
?>


<?php
get_footer();
?>
