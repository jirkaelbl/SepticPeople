<?php
/*
    Template name: Koncerty
*/
get_header();
?>

<div class="container my-5">
    <h1 class="mb-4">Nadcházející koncerty</h1>

    <?php
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'meta_query'     => array(
            array(
                'key'     => '_wp_page_template',
                'value'   => 'koncertDetail-page.php',
            ),
            array(
                'key'     => '_koncert_datum',
                'value'   => date('Y-m-d H:i'),
                'compare' => '>=', // jen budoucí koncerty
                'type'    => 'DATETIME'
            ),
        ),
        'meta_key'       => '_koncert_datum',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'posts_per_page' => -1
    ));

    if ($query->have_posts()) {
        echo '<div class="d-flex flex-column my-4 align-items-center justify-content-center">';
        while ($query->have_posts()) {
            $query->the_post();

            $adresa = get_post_meta(get_the_ID(), '_koncert_adresa', true);
            $dateInput = get_post_meta(get_the_ID(), '_koncert_datum', true);
            if ($dateInput) {
                $cas = date_i18n('H:i', strtotime($dateInput));
                $den = date_i18n('l, d.', strtotime($dateInput));
                $mesic = date_i18n('F', strtotime($dateInput));
                $datum = $den . '&nbsp;' . $mesic;
            }
            ?>

            <div class="w-100 w-md-75 my-3 ">
                    <div class="card h-100 shadow-sm">
                        <div class="d-flex koncert-card">
                            <div class="koncert-date bg-dark text-white p-3 text-decoration-none d-flex justify-content-center align-items-center">
                                <div class="m-3">
                                    <i class="fa-solid fa-calendar-day fs-1"></i>
                                </div>
                                <div class="fs-4 fs-md-6">
                                    <?= $datum ?><br>
                                    <?= $cas ?>
                                </div>

                            </div>
                            <div class="p-3">
                                <div class="d-flex flex-column flex-md-row mb-4">
                                    <h5 class="card-title fs-3 mx-2"><?php the_title(); ?></h5>
                                    <?php
                                    if ($adresa) {
                                        $mapa_url = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($adresa);
                                        ?>
                                        <a href="<?= esc_url($mapa_url) ?> " target="_blank" rel="noopener" class="koncert-place d-flex justify-content-center align-items-center mx-4 btn btn-dark">
                                            Navigace <i class="fa-solid fa-map-location-dot m-1"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <i class="fa-solid fa-location-dot mx-2 my-2 mx-md-4 fs-1"></i>

                                    <div class="card-text koncert-place d-flex flex-md-row flex-column justify-content-center align-items-center">


                                    <?= esc_html($adresa) ?: 'Adresa zatím není zadána' ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                </a>-->
            </div>

            <?php
        }
        echo '</div>';
    } else {
        echo '<p>Žádné koncerty nebyly nalezeny.</p>';
    }
    ?>

</div>

<?php get_footer(); ?>
