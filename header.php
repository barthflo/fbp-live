<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name');?></title>
    <?php wp_head();?>
</head>


<body class="<?php body_class();?>">
<div class="site-wrap container-fluid no-gutters p-0">
        <header id="sidebar" class= "p-1">
<!-- HEADER -->
            <div class="header">
                <div id="logo" class="mb-2"><?php the_custom_logo();?></div>

                <h2 class="m-0"><?php bloginfo('name')?></h2>
                
                <nav class="site-nav p-0 mb-2">
                    <ul class="p-0"><?php wp_nav_menu(array(
                        'container_class' => 'primary-menu',
                        'theme_location' => 'primary'
                        ));?>
                    </ul>
                </nav>
            </div>
<!-- CONTENT NAVIGATION -->            
            <div class="sidebar-content">
<!-- PAGE ABOUT --> 
<?php if (is_page('about')):?>
                <div class="about"><?php dynamic_sidebar('sidebar_about');?></div>
<?php endif;?>
<!-- PAGE STORIES -->
<?php if(is_page('stories')||is_page('prints')): ?>
                <div id="navThumbnails-stories" class="col-10 offset-1 no-gutters pb-2 pt-1"><?php thumbnail_nav();?></div>
<?php else : ?>
                <div id="navThumbnails" class="col-10 offset-1 no-gutters pb-2 pt-1"><?php thumbnail_nav();?></div>
<?php endif; ?>
<!-- PAGE PRINTS -->
<?php if (is_page ('prints')):?>               
                <div class="cart"><?php dynamic_sidebar('widget_sidebar');?></div>
<?php endif; ?>
            
<!--FOOTER-->
            <div class="footer p-0 m-0">
                <?php wp_nav_menu(array(
                    'container_class' => 'footer-menu',
                    'theme-location' => 'footer'
                ));?>
                <p>©Florent Barth 2019</p>
            </div>
        </header> 
    
<!-- START CONTENT -->    
        <div id="content" class="container-fluid no-gutters p-0"> 
    
    