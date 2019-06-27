<?php
    /*
        Template Name: Services Template
    */
?>

<?php get_header('full'); ?>

<h1>This is from services-template.php</h1>


      <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
            <div class="row">
                <div class="col">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        <hr>

        <div class="row">
            <div class="col">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
        $args = array(
            'post_type' => 'Services',
            'posts_per_page' => -1,
            'order'   => 'ASC',
            'orderby' => 'title',
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
                  <div class="col-4">
                      <div class="card">
                          <div class="card-body">
                             <h3 class="card-title"><?php the_title(); ?></h3>
                             <p> <?php the_excerpt(); ?> </p>
                             <a class="btn btn-warning btn-block" href="<?php the_permalink(); ?>">View Service</a>
                          </div>
                      </div>
                  </div>
              <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>






    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>