<?php
get_header();
?>
<div class="hero-image">
    <video autoplay muted loop playsinline preload="auto">
        <source src="<?php echo get_template_directory_uri(); ?>/videos/Septic_V4.mp4" type="video/mp4">
        Váš prohlížeč nepodporuje přehrávání videa.
    </video>
    <div class="arrow-down"><i class="fa-solid fa-angle-down fa-2xl"></i></div>
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
