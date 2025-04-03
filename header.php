<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style/style.css">

    <title><?php echo "SP | " .  get_bloginfo('name'); ?></title>
=======
    <title><?php echo "SP |" .  get_bloginfo('name'); ?></title>
>>>>>>> c1819aaf81a82dca0cb0bb344a34ff090acf19b8
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav><?php wp_nav_menu(array('theme_location' => 'primary')); ?></nav>
</header>