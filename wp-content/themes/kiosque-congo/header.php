<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kiosque_congo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>


	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>KIOSQUE - JOURNAL DE BRAZZAVILLE</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicons ==== -->
    <link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/assets/favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

    <!-- ==== Font Awesome ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/font-awesome.min.css">

    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/bootstrap.min.css">

    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/fontawesome-stars-o.min.css">

    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/style.css">

    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/responsive-style.css">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/colors/theme-color-1.css" id="changeColorScheme">

    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/custom.css">

   
</head>

<body>


    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="header--section header--style-5">

            <!-- Header Navbar Start -->
            <div class="header--navbar navbar bd--color-1 bg--color-0" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">


                        <!-- Header Logo Start -->
                        <div class="header--logo text-center">
                            <h1 class="h1">
                                <a href="<?php echo home_url(); ?>" class="btn-link">
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/logo2.png" alt="USNews Logo">                                    
                                </a>
                            </h1>
                        </div>
                        <!-- Header Logo End -->
                    </div>
                      
                </div>
            </div>
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->
