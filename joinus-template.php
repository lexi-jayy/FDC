<?php
    /* Template Name: Join us Template */
    if($_POST){
        $errors = array();
        if(wp_verify_nonce($_POST['_wpnonce'], 'wp_Joinus_form')){
            if(!$_POST['JoinusUsername']){
                array_push($errors, 'Your name is required');
            }
            if(!$_POST['JoinusPassword']){
                array_push($errors, 'Your Password is required');
            }
            if(!$_POST['JoinusConfirmPassword']){
                array_push($errors, 'Your Password is needs to be confirmed');
            }
            // if(!$_POST['JoinusPassword' || 'JoinusConfirmPassword']){
            //     array_push($errors, 'Your Password needs to match');
            // }
            if(!$_POST['JoinusEmail']){
                array_push($errors, 'Your email is required');
            }
            if(empty($errors)){
                $args = array(
                    'post_content' => $_POST['JoinusMessage'],
                    'post_title' => $_POST['JoinusUsername'],
                    'post_type' => 'Joinus',
                    'meta_input' => array(
                        'password'=> $_POST['JoinusPassword'],
                        'password'=> $_POST['JoinusConfirmPassword'],
                        'email'=> $_POST['JoinusEmail']
                    )
                );
                wp_insert_post($args);
            }
        } else {
            array_push($errors, 'Something went wrong with submitting your application');
        }
    }
?>

<?php get_header('full'); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1><?php the_title(); ?></h1>
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
                                <p>Thank you for sending a application someone shall review your application and activate your account</p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col">
                            <form class="needs-validation" novalidate action="<?php echo get_permalink();?>" method="post">
                                <?php wp_nonce_field('wp_Joinus_form'); ?>
                                <div class="form-group">
                                    <label for="">UserName</label>
                                    <input type="text" name="JoinusUsername" class="form-control" value="<?php echo $_POST['JoinusUsername'] ?>" placeholder="UserName">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <small id="passwordHelpInline" class="text-muted">
                                        Must be 8-20 characters long.
                                    </small>
                                    <input type="password" name="JoinusPassword" class="form-control" value="" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="JoinusConfirmPassword" class="form-control" value="" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="JoinusEmail" class="form-control" value=""placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Send Message" class="btn btn-primary btn-block">
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