<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title> <?php
            // Se for FrontPage or Home
            if(is_home() || is_front_page()){
                echo get_bloginfo('name') . ' - ' . get_bloginfo('description');
            } else {
                 wp_title( ' - ', true, 'right' ); echo  bloginfo('name');
            }
    ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="author" content="bbento" />
    <meta name="robots" content="follow,all" />
    <meta http-equiv="Content-Language" content="pt-br" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png" type="image/png"/>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">
    <!-- // Font -->
    <?php wp_head(); ?>
</head>

<body>
    
<header>

</header>

<main>

