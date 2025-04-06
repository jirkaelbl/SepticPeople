<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style/style.css">

    <title><?php echo "SP | " .  get_bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>
<body class="d-flex flex-column min-vh-100" <?php body_class(); ?>>
<?php  if (get_the_title() === "Ahoj všichni!")  {?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navigace position-absolute z-3 w-100">
            <div class="container-fluid">
                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="text-center ms-4 d-none d-lg-block">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Tlačítko pro hamburger menu (mobilní zařízení) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="d-block d-lg-none">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Vlastní menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false, // Nepotřebujeme žádný další obal kolem menu
                        'menu_class' => 'nav-menu ms-auto', // Používáme třídu pro vertikální i horizontální zobrazení
                        'depth' => 2, // Pokud máš sub-menu (rozbalovací menu), nastav depth na 2
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>

<?php } else { ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="text-center ms-4 d-none d-lg-block">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Tlačítko pro hamburger menu (mobilní zařízení) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="d-block d-lg-none">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Vlastní menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false, // Nepotřebujeme žádný další obal kolem menu
                        'menu_class' => 'nav-menu ms-auto', // Používáme třídu pro vertikální i horizontální zobrazení
                        'depth' => 2, // Pokud máš sub-menu (rozbalovací menu), nastav depth na 2
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>

<?php } ?>

