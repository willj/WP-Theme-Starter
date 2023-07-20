<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
	<header class="site-header">
        <div class="header-bar-wrapper">
            <div class="header-bar">
                <div class="site-identity">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php bloginfo( 'name' ); ?>
                        </a>                        
                    <?php endif; ?>
                </div>
                
                <div class="header-menu-wrapper">
                    <button class="header-menu-button">Menu</button>
                    <nav class="header-menu-content" role="navigation" aria-label="Main Menu">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'header',
                                'menu_class'     => 'header-menu',
                                'container'		 => '',
                                'link_after' => '<button class="expand-sub-menu-button"></button>'
                            ) );
                        ?>
                    </nav>
                </div>
            </div>
        </div>
	</header>

	<main>