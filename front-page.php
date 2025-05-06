<?php
get_header();
?>
<div class="hero-image">
    <video autoplay muted loop playsinline preload="auto">
        <source src="<?php echo get_template_directory_uri(); ?>/videos/Septic_V4.mp4" type="video/mp4">
    </video>
    <div class="arrow-down"><i class="fa-solid fa-angle-down fa-2xl"></i></div>
</div>

<!--TODO: HTML kód-->

<div class="background_image">
    <section id="kapela">
        <h1>Info o kapele</h1>
    </section>

    <section id="spotify">
        <h1>Přehrávač pro spotify</h1>
    </section>

    <section id="koncerty">
        <h1>Prvním 5 koncertů ze seznamu a pak zbytek přes tlačítko</h1>
    </section>

    <section id="aktuality">
        <h1>Přehled základních aktualit</h1>
    </section>

    <section id="promo">
        <h1>Sociální sítě</h1>
    </section>

    <section id="promo">
        <h1>PROMO</h1>
    </section>
</div>





<?php

get_footer();
?>
