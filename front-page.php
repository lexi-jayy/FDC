<?php get_header('full'); ?>

<h1>This is from our front-page.php file</h1>



<?php
    $args = array(
        'post_type' => 'Service',
    );
    $allServices = new WP_Query($args);
?>

<?php if( $allServices->have_posts() ): ?>
        <div class="innercon">
          <div class="row mb-5">
              <div class="col-12">
                  <h2 id="servicefl">All of our services</h2>
              </div>
              <?php while( $allServices->have_posts() ): $allServices->the_post(); ?>
                  <div class="col-3">
                      <div class="card">
                          <div class="card-body">
                             <h3 class="card-title"><?php the_title(); ?></h3>
                             <p> <?php the_excerpt(); ?> </p>
                             <a class="btn btn-warning btn-block" href="<?php the_permalink(); ?>">View Services</a>
                          </div>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>






<?php get_footer(); ?>