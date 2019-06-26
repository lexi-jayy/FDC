<div class="row">
    <div class="col-12">
        <p>This is a Service post</p>
    </div>
    <div class="col-12">
    <?php if( have_posts() ): ?>
        <?php while( have_posts() ): the_post() ?>
        <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                </div>
                <div class="card-footer bg-white">
                    <a class="btn btn-secondary btn-block" href="<?php the_permalink(); ?>">View Post</a>
                    <p class="card-text"><small class="text-muted">Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></small></p>
                </div>
            </div>
        </div>
    </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
</div>
