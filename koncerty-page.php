<?php
/*
    Template name: Koncerty
*/
get_header();
?>
<!--TODO: HTML kód-->
Koncerty page


<?php
$query = new WP_Query(array(
    'post_type'  => 'page',
    'meta_key'   => '_wp_page_template',
    'meta_value' => 'koncertDetail-page.php',
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
    echo '<p>Žádné koncerty nebyly nalezeny.</p>';
}
?>


<?php
get_footer();
?>
