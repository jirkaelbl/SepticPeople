<?php
/*
    Template name: Produkt
*/
get_header();
?>
<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/background/kapela_koncert.jpg'); background-size: cover;">
    <div class="kryti">
        <div class="container col-9 stin" style="background-color: white;">
            <div class="row pt-5 pb-5 col-11 m-auto">
                <div class="col-md-6">
                    <?php
                    $obrazky = get_post_meta(get_the_ID(), '_obrazky_produktu', true);
                    if ($obrazky && is_array($obrazky) && count($obrazky) > 0) {
                        // Hlavní obrázek (první v poli)
                        $hlavni_id = $obrazky[0];
                        echo wp_get_attachment_image($hlavni_id, 'large', false, [
                            'class' => 'img-fluid mb-3',
                            'id'    => 'hlavni-obrazek'
                        ]);

                        // Náhledy pod ním
                        echo '<div class="d-flex flex-wrap gap-2">';
                        foreach ($obrazky as $id) {
                            echo wp_get_attachment_image($id, 'thumbnail', false, [
                                'class' => 'img-thumbnail obrazek-miniatura',
                                'style' => 'cursor:pointer; max-width:100px; height:auto;',
                                'data-src' => wp_get_attachment_image_url($id, 'large')
                            ]);
                        }
                        echo '</div>';
                    } elseif (has_post_thumbnail()) {
                        the_post_thumbnail('large', ['class' => 'img-fluid']);
                    } else {
                        $obrazky = [
                            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIslsZ2Ff7FuhnkwjPfwxqmhbFaH4glamoxA&s',
                            'https://images.pexels.com/photos/322207/pexels-photo-322207.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                            'https://images.pexels.com/photos/298863/pexels-photo-298863.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                            'https://images.pexels.com/photos/45982/pexels-photo-45982.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
                        ];

                        echo '<div style="width:100%; height: 500px; object-fit: cover"><img src="' . $obrazky[0] . '" class="img-fluid mb-3 w-100 h-100" id="hlavni-obrazek" alt="Hlavní obrázek" style="object-fit: cover"></div>';

                        echo '<div class="d-flex flex-wrap gap-2">';
                        for ($i = 0; $i < count($obrazky); $i++) {
                            echo '<img src="' . $obrazky[$i] . '" class="img-thumbnail obrazek-miniatura" style="cursor:pointer; max-width:100px; height:auto;" data-src="' . $obrazky[$i] . '">';
                        }
                        echo '</div>';
                    }
                    ?>
                </div>


                <!-- Informace o produktu -->
                <div class="col-md-6 mt-5">
                    <h1><?php the_title(); ?></h1>

                    <p class="mt-4">
                        <?php the_content(); ?>
                    </p>

                    <?php
                    $cena = get_post_meta(get_the_ID(), '_cena_produktu', true);
                    if ($cena) {
                        echo '<p class="fs-4 fw-bold text-success">' . number_format($cena, 2, ',', ' ') . ' Kč</p>';
                    } else {
                        echo '<p class="card-text text-muted">Cena není uvedena</p>';
                    }

                    $velikosti = get_post_meta(get_the_ID(), '_velikosti_produktu', true);
                    if ($velikosti && is_array($velikosti)) {
                        echo '<p class="mb-1">Dostupné velikosti:</p>';
                        echo '<div class="d-flex flex-wrap gap-2 mb-3">';
                        foreach ($velikosti as $v) {
                            echo '<span class="btn btn-outline-dark btn-sm" style="pointer-events: none;">' . esc_html($v) . '</span>';
                        }
                        echo '</div>';

                        echo '<div>
                            <a href="mailto:objednavky@tvujeshop.cz?subject=Objednávka: ' . rawurlencode(get_the_title()) .
                                             '&body=' . rawurlencode("Dobrý den,\n\nměl bych zájem o produkt: " . get_the_title() .
                                                                     "\nVelikost: [doplňte velikost]\n".
                                                                        "Množství: [doplňte množství]\n\nDěkuji.\n\n[doplňte jméno, příjemní, adresu]") . '" 
                            class="btn btn-dark btn-lg mt-3">
                                Odeslat objednávku e-mailem&nbsp;&nbsp;<i class="fa-solid fa-envelope"></i>
                            </a>
                        </div>';
                    } else {
                        echo '<p class="card-text text-danger">Produkt není dostupný</p>';
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hlavni = document.getElementById('hlavni-obrazek');
        const miniatury = document.querySelectorAll('.obrazek-miniatura');

        miniatury.forEach(img => {
            img.addEventListener('click', () => {
                hlavni.src = img.dataset.src;
            });
        });
    });
</script>

<?php
get_footer();
?>
