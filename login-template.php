<?php
    /* Template Name: Log In Template */
    if($_POST){
        $errors = array();
        if(wp_verify_nonce($_POST['_wpnonce'], 'wp_login_form')){
            if(!$_POST['loginUsername']){
                array_push($errors, 'Your Username is required');
            }
            if(!$_POST['loginPassword']){
                array_push($errors, 'Your Password is required');
            }
            if(empty($errors)){
                $args = array(
                    'post_title' => $_POST['loginUsername'],
                    'post_type' => 'login',
                    'meta_input' => array(
                        'password'=> $_POST['loginPassword'],
                    )
                );
                wp_insert_post($args);
            }
        } else {
            array_push($errors, 'Something went wrong with your login');
        }
    }
?>

<?php get_header('full'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="title"><?php the_title(); ?></h1>
            </div>
        </div>
        <?php if( have_posts() ): ?>
            <?php while( have_posts() ): the_post() ?>
                <div class="row">
                    <div class="col">
                        <div class="wp_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <?php if($_POST && !empty($errors)): ?>
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach($errors as $singleError): ?>
                                        <li><?php echo $singleError; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>


                <?php if($_POST && empty($errors)): ?>
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success">
                                <p>Login Successful you will be redirected soon</p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col">
                            <form class="needs-validation" novalidate action="<?php echo get_permalink();?>" method="post">
                                <?php wp_nonce_field('wp_login_form'); ?>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="loginUsername" class="form-control" value="<?php echo $_POST['loginUsername'] ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <small id="passwordHelpInline" class="text-muted">
                                        Must be 8-20 characters long.
                                    </small>
                                    <input type="password" name="loginPassword" class="form-control" value="" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Log In" class="btn btn-primary btn-block">
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>


            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>