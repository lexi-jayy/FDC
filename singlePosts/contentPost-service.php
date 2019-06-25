<!-- <div class="row">
    <div class="col-12">
        <p>This is a Service post</p>
    </div>
    <div class="col-12">
    </div>
</div> -->

<?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
            <div class="row">
                <h2><?php the_title(); ?></h2>
                <p>Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
                <div class="content">
                    <?php the_content(); ?>
                </div>
                <hr>
            </div>
            <?php
                get_template_part('singlePosts/contentPost-service', get_post_format() );
            ?>
        <?php endwhile; ?>
    <?php endif; ?>