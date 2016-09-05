<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <script src="<?php echo(get_template_directory_uri()); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/css/knacss.css" type="text/css">
        <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo(get_template_directory_uri()); ?>/css/main.css" type="text/css">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header>
            <div class="container grid-1-3">
                <div class="man"><a href="<?php echo esc_url( home_url() ); ?>" class="logo"><img src="<?php echo(get_template_directory_uri()); ?>/img/gamer-stuff-logo.png" height="82" width="250" alt="" /></a></div>
                <div class="txtright tiny-hidden"><img src="https://s.adroll.com/a/4ET/N66/4ETN66D4M5GHFD3NWMKDYV.gif" alt="" /></div>
            </div>
        </header>

        <nav>
            <div class="container">
                <?php wp_nav_menu(array('theme_location' => 'nav-header')); ?>
                <input class="search-input fr" type="search" value="" placeholder="Que cherchez-vous ?">
            </div>
        </nav>

        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<div id="breadcrumbs"><div class="container"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a> > ','</div></div>');
            }
        ?>
