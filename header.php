<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          crossorigin="anonymous"
          onerror="this.onerror=null; this.href='assets/bootstrap-5.3.2-dist/css/bootstrap.min.css';">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
            onerror="this.onerror=null; this.src='assets/bootstrap-5.3.2-dist/js/bootstrap.bundle.js';" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style/style.css">

    <title><?php echo "SP | " .  get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav><?php wp_nav_menu(array('theme_location' => 'primary')); ?></nav>
</header>