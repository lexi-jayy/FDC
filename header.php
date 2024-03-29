<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FusionDigital Communications</title>
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?> >
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light custom_nav" role="navigation">
              <div class="container">
            	<!-- Brand and toggle get grouped for better mobile display -->
            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            		<span class="navbar-toggler-icon"></span>
            	</button>
            	<a class="navbar-brand" href="#">Navbar</a>
            		<?php
            		wp_nav_menu( array(
            			'theme_location'    => 'header_menu',
            			'depth'             => 2,
            			'container'         => 'div',
            			'container_class'   => 'collapse navbar-collapse',
            			'container_id'      => 'bs-example-navbar-collapse-1',
            			'menu_class'        => 'nav navbar-nav',
            			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            			'walker'            => new WP_Bootstrap_Navwalker(),
            		) );
            		?>
            	</div>
            </nav>
			<header> 
            <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
            </header>
