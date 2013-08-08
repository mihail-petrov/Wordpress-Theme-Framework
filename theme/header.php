<!doctype html>
<html lang="en">

<head>
        <meta charset="UTF-8">

         <!--=== TITLE ===-->
        <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>

        <!-- Add External Styles -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <!-- SEO meta tags -->
        <meta name="description" content="Keywords">
        <meta name="author" content="Name">

        <!-- mobile content viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!--[if lt IE 9]>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <![endif]-->
        
        <?php wp_head(); ?> 
</head>

<body>

<!-- WEB HEADER -->
<header id="web_header">
    
    <!-- WEB NAVIGATION -->
    <nav id="web_nav">
        <ul>
            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
    </nav>

</header>