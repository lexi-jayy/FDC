<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>FusionDigital Communications</title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <!-- <p>This is from header.php</p> -->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-md navbar-light custom_nav" role="navigation">
              <div class="container-fluid">
            	<!-- Brand and toggle get grouped for better mobile display -->
            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            		<span class="navbar-toggler-icon"></span>
            	</button>
            	<a class="navbar-brand" href="front-page.php">
				<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
				if ( has_custom_logo() ) {
					echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
				} else {
					echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
				}?>
				
				</a>
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
            <header id="header">
			<div>
            <img src="<?php header_image(); ?>"  alt="" class="img-fluid"/>
			</div>
            </header>