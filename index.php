<?php get_header('full'); ?>

<h1>This is from our index.php file</h1>



<?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post() ?>
        <div class="innercon">
            <h2><?php the_title(); ?></h2>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <hr>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>There is no post</p>
<?php endif; ?>






<?php get_footer(); ?>