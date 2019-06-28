<?php
    /* Template Name: Support Template */
    if($_POST){
        $errors = array();
        if(wp_verify_nonce($_POST['_wpnonce'], 'wp_Support_form')){
            if(!$_POST['SupportName']){
                array_push($errors, 'Your name is required');
            }
            if(!$_POST['SupportEmail']){
                array_push($errors, 'Your email is required');
            }
            if(!$_POST['SupportMessage']){
                array_push($errors, 'A message is required');
            }
            if(empty($errors)){
                $args = array(
                    'post_content' => $_POST['SupportMessage'],
                    'post_title' => $_POST['SupportName'],
                    'post_type' => 'Supports',
                    'meta_input' => array(
                        'email'=> $_POST['SupportEmail']
                    )
                );
                wp_insert_post($args);
            }
        } else {
            array_push($errors, 'Something went wrong with submitting your request for support the form');
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
                            <h2> Ticket has been sent </h2>
                                <p>Thank you for sending a ticket to support we will get back to you as soon as we can</p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col">
                            <form action="<?php echo get_permalink();?>" method="post">
                                <?php wp_nonce_field('wp_Support_form'); ?>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="SupportName" class="form-control" value="<?php echo $_POST['SupportName'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="SupportEmail" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea class="form-control" name="SupportMessage" rows="8" cols="80"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Send Message" class="btn btn-primary btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>


            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>