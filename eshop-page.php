<?php
/*
    Template name: E-shop
*/
get_header();
?>

<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/kapela_koncert.jpg'); background-size: cover;">
    <div class="kryti">
        <div class="container col-9 stin" style="background-color: white;">
            <div class="container p-5 min-vh-100">
                <h1 class="mb-4"><i class="fa-solid fa-basket-shopping"></i> E-shop</h1>
                <p><?php the_content(); ?></p>
                <?php
                $query = new WP_Query(array(
                    'post_type'  => 'page',
                    'meta_key'   => '_wp_page_template',
                    'meta_value' => 'produkt-page.php',
                    'orderby'    => 'date',
                    'order'      => 'DESC',
                    'posts_per_page' => -1
                ));

                if ($query->have_posts()) {
                    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class="col">
                            <div class="card h-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>" class="d-flex align-items-center justify-content-center">
                                        <i class="text-dark fa-solid fa-image p-5" style="font-size: 10rem"></i>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text">
                                        <?php
                                        $cena = get_post_meta(get_the_ID(), '_cena_produktu', true);
                                        if ($cena) {
                                            echo '<p class="card-text fw-bold text-success">' . number_format($cena, 2, ',', ' ') . ' Kč</p>';
                                        } else {
                                            echo '<p class="card-text text-muted">Cena není uvedena</p>';
                                        }
                                        ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-dark">Objednat</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                } else {
                    echo '<p>Žádné produkty nebyly nalezeny.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
