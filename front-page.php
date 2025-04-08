<?php
get_header();
?>
<div class="hero-image">
    <img src="<?php echo get_template_directory_uri(); ?>/images/kapela_koncert.jpg" alt="Úvodní obrázek">

    <div class="hero-text text-center">
        <h1>Septic People</h1>
    </div>
</div>

<!--TODO: HTML kód-->
front page
<section id="uvod">
    <h1>Úvodka - video</h1>
</section>

<section id="kapela">
    <h1>Přehled členů kapely, info o kapele</h1>
</section>

<section id="promo">
    <h1>PROMO</h1>
</section>



<?php
the_content();


get_footer();
?>
