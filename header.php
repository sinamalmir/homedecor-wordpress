<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset=<?php bloginfo("charset"); ?>>
        <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    link font awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!--     link for animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php wp_head(); ?>
</head>


<body <?php body_class();  ?> >
<!--this function work with wordpress 5.2 and longer -->
<?php
if ( function_exists( 'wp_body_open' ) ) {wp_body_open();}
?>
<!-- start header-->
<header>
    <?php get_template_part('template/header/top-header') ?>
    <?php get_template_part('template/header/bottom-header') ?>
</header>
<!-- end header-->
<?php get_template_part('template/header/modal-search') ?>

