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

            <div class="container-fluid row d-lg-flex d-none">
                <!-- Odkaz pro logo nebo název webu -->
                <div class="col-lg-4 col-md-2 col-sm-1 d-flex justify-content-center align-items-center">
                    <a href="<?php echo home_url(); ?>" class="nav-logo text-center pb-3">
                        <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.png" as="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.png" alt="Logo" loading="lazy">
                    </a>
                </div>

                <!-- Vlastní menu -->
                <div class="col-lg-8 col-md-10 col-sm-11 collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false,
                        'menu_class' => 'nav-menu ms-auto',
                        'depth' => 2,
                    ));
                    ?>
                </div>
            </div>

            <div class="container-fluid d-flex d-lg-none">

                <!-- Tlačítko pro hamburger menu (mobilní zařízení) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-2xl" style="color: white;"></i>
                </button>

                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="justify-content-center mx-auto mt-1">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.png" as="image">
                    <img style="margin-left: -46px;" src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.png" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Vlastní menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false,
                        'menu_class' => 'nav-menu ms-auto',
                        'depth' => 2,
                    ));
                    ?>
                </div>
            </div>
        </nav>

    </header>

<?php } else { ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-black w-100">

            <div class="container-fluid row d-lg-flex d-none">
                <!-- Odkaz pro logo nebo název webu -->
                <div class="col-lg-4 col-md-2 col-sm-1 d-flex justify-content-center align-items-center">
                    <a href="<?php echo home_url(); ?>" class="nav-logo text-center pb-3">
                        <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" loading="lazy">
                    </a>
                </div>

                <!-- Vlastní menu -->
                <div class="col-lg-8 col-md-10 col-sm-11 collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false,
                        'menu_class' => 'nav-menu ms-auto',
                        'depth' => 2,
                    ));
                    ?>
                </div>
            </div>

            <div class="container-fluid d-flex d-lg-none">

                <!-- Tlačítko pro hamburger menu (mobilní zařízení) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-2xl" style="color: white;"></i>
                </button>

                <!-- Odkaz pro logo nebo název webu -->
                <a href="<?php echo home_url(); ?>" class="justify-content-center mx-auto mt-1">
                    <link rel="preload_image" href="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" as="image">
                    <img style="margin-left: -46px;" src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" width="80" height="80" loading="lazy">
                </a>

                <!-- Vlastní menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'container' => false,
                        'menu_class' => 'nav-menu ms-auto',
                        'depth' => 2,
                    ));
                    ?>
                </div>
            </div>
        </nav>

    </header>

<?php } ?>

