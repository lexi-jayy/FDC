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

                            <h2> Information </h2>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Delivery
                                        </button>
                                    </h3>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body con">
                                    <h5>When will my order arrive?</h5>
                                    <p>Orders generally wait until all the items are in stock before being dispatched. Once all items are in stock the order is shipped overnight to your shipping address if in the North Island, or there is a 2 day delivery to South Island Addresses. </p>
                                    <h5>What is the cut off time for ordering?</h5>
                                    <p>Orders made and paid for by 15:00 on business days are generally dispatched that evening. Obviously the earlier in the day the better the chance is of getting dispatched that day. </p>
                                    <h5>Which Courier company do you use?</h5>
                                    <p>The majority of orders are shipped using Courier Post. Orders that are oversized or over 25kg are shipped using one of several bulk freight companies. </p>
                                    <h5>Can I specify a time to have my order delivered?</h5>
                                    <p>Generally this is not possible. This is due to the fact that once the order has been dispatched from our warehouse it is in the hands of the courier company. It may be possible for you to coordinate directly with the courier company using the order track and trace number but this is outside of our service. </p>
                                    <h5>What happens if my order arrives at my Shipping Address and no one is there?</h5>
                                    <p>All orders require a signature upon delivery. If no one is available to sign for the order when the courier arrives, they will leave a card informing you to collect the item from their depo or to contact them to arrange a more suitable time to deliver the consignment. </p>
                                    <h5>How much does it cost to ship my order?</h5>
                                    <p>Orders under a total value of $200 inc GST incur a delivery fee of $9.50. Orders over $200 are shipped free of charge. </p>
                                    <h5>Do you deliver to oversea addresses?</h5>
                                    <p>No. </p>
                                    <h5>Do you deliver to PO Boxes?</h5>
                                    <p>No. This is due to the fact that a signature is required for all deliveries. </p>
                                    <h5>What do I do if I haven't recieved my order or if I have a problem with the delivery?</h5>
                                    <p>Please contact us in the first instance and we will investigate for you. This includes orders that have not arrived when they should have or for orders that have arrived damaged. </p>
                                    <p>If you cannot find what you are looking for or have a question not answered here, please do not hesitate to contact us. </p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Ordering
                                        </button>
                                    </h3>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body con">
                                    <h5>Can anyone place an order on the website?</h5>
                                    <p>Yes. Our customers include individuals, small office/home offices, medium sized companies and educational facilities. </p>
                                    <h5>How can I place an order?</h5>
                                    <p>If you know what you would like to purchase, the easiest and fastest way of placing an order is by adding the product(s) that you would like to a shopping cart on our website and processing an order that way. </p>
                                    <h5>What if I don't know what I want?</h5>
                                    <p>If you would like to make a purchase but you aren't sure which item will best suit your needs, contact us and we will assist in finding the right product(s) for you. </p>
                                    <h5>Can I place an order over the phone?</h5>
                                    <p>Yes you can. Our customer service team are only too happy to help you with this if you do not feel comfortable ordering using our website. </p>
                                    <h5>Do I need to have an account with you to place an order?</h5>
                                    <p>As part of the order process, our system will ask you for some basic details so we know who is placing the order, where to send it to and how to contact you if we need to in relation to your order. You will also be asked to nominate a username and password so that you can log into the secure part of our website in the future to view your account/order history. </p>
                                    <h5>When is the order dispatched from the warehouse?</h5>
                                    <p>Once the order has been processed by our website and payment has been recieved your order is ready to be dispatched by the warehouse. This will generally happen that evening providing the payment has been made before 15:00. </p>
                                    <h5>Can I come and pick the order up?</h5>
                                    <p>Our warehouse is located at 60 Kerrs Rd, Wiri, South Auckland. If you would like to pick an order up from this address you will need to have processed and paid for the order at least 2 hours before you wish to pick it up. Payments cannot be made at this address. </p>
                                    <h5>How do I cancel an order?</h5>
                                    <p>Before the order has been paid for and processed you can cancel it by opening the order on our website and clicking on "cancel order". Once the order has been paid for and processed you will need to contact us to see if it is still possible to cancel. Once the order has been dispatched it is no longer possible to cancel. </p>
                                    <p>If you cannot find what you are looking for or have a question not answered here, please do not hesitate to contact us. </p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Payments
                                        </button>
                                    </h3>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body con">
                                    <h5> Account</h5>
                                    <p>Append this order amount to your FDC customer account. Your order will be processed immediately, provided that you have adequate avaliable credit in your account.</p>
                                    <h5>Cheque</h5>
                                    <p>Post a cheque to us at:</p>
                                    <p>FusionDigital Communications Ltd</p>
                                    <p>Po Box 9280</p>
                                    <p>Wellington 6030</p>
                                    <p>Please include the bottom portion of your invoice or your customer number for ease of processing. Once your payment has been received, your order will be processed/subscription updated. </p>
                                    <h5>Credit Card</h5>
                                    <p>You can pay for your order online using our 128bit secure Credit Card Processing Facility. Simply select "Credit Card" as the method of payment when you process your order. Or you can go to the "Transactions" section of the My Account page to make a Credit Card payment to your account. </p>
                                    <h5>Online Banking/Direct Credit</h5>
                                    <p>All major New Zealand banks let their customers pay bills online. To use your online banking system to pay for your FDC account, use the following information: </p>
                                    <p>Company: FusionDigital Communications Ltd </p>
                                    <p>Bank account number: 06 0513 0192482 001</p>
                                    <p>References: Your FDC account Name </p>
                                    <p>Particulars: Your FDC account Number </p>
                                    <p>Payments will appear on your account the following day (depending on your bank transaction processing times). Your bank may charge fees for this service. Once your payment has been received, your order will be processed/subscription updated. </p>
                                    <p>If you cannot find what you are looking for or have a question not answered here, please do not hesitate to contact us. </p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Products
                                        </button>
                                    </h3>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body con">
                                    <h5>Are your prices up to date?</h5>
                                    <p>Our online catalog is updated on a daily basis. All prices are subject to change without warning. The price listed at the time that you place your order will be the price that you pay (except in the event of an obvious error). One of our goals is to keep our prices as competitive as possible.
                                    </p>
                                    <h5>Are your products parallel imported?</h5>
                                    <p>No. All of our products are genuine. </p>
                                    <h5>What does the product availability mean?</h5>
                                    <p>Along with our pricing information our warehouse's stock levels are updated on a daily basis. Our website usually indicates the number of items that are currently in stock, an estimated date of arrival to our warehouse or an estimated lead time for the item to arrive from manafacturers. Please note that when an item is not in stock, the lead time or date of arrival is the manafacturer's best estimate. Sometimes the item can arrive earlier or later than advised. </p>
                                    <h5>I've been waiting for a backorder for longer than estimated. What can I do?</h5>
                                    <p>You can contact us for an update on the progress of your order. From there you can decide whether you would like to continue to wait for it or if you would like to cancel the order for a full refund. </p>
                                    <h5>How can I find a product on your website?</h5>
                                    <p>Generally the easiest way to find products on our website is to search for it using the manafacturer's product ID or key words using our search bar. Alternatively, you can find all of our products by using the "Products and Services" drop down menu.
                                    I've searched high and low on your website but I still can't find what I'm looking for
                                    Feel free to contact us if you have any specific requirements. Our website lists ~95% of the products that we can offer. We may be able to help you source a particular item or recommend other companies that you could talk to. </p>
                                    <h5>What is OEM?</h5>
                                    <p>OEM - Original Equipment Manafacturer. These items usually come with very basic packaging and only fundamental user guides etc. In contrast to full retail versions of products, these items have all of the same functionality that retail versions have but they are best suited to customers who are familiar with installing such components etc. </p>
                                    <h5>What is an academic product?</h5>
                                    <p>An academic product is identical to a full version product except for the fact that they can only be purchased and used by persons who qualify for academic licences. Typically students and members of academic institutions are eligible to use these products. Evidence of affiliation to an educational facility will be required to purchase such items. </p>
                                    <p>If you cannot find what you are looking for or have a question not answered here, please do not hesitate to contact us. </p>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Returns and Warranty
                                        </button>
                                    </h3>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body con">
                                    <h5>The product that I purchased from you has recently died. How can I organise a return or repair?</h5>
                                    <p>In the first instance you will need to send an email to returns@fdc.net.nz with details of the product, the problems you are having with it and your FDC account details. We will then determine whether the item is able to be returned or repaired and advise you on the appropriate course of action. Please note that an item is not considered to be faulty simply because it is incompatible with your other equipment. </p>
                                    <h5>I have decided that I no longer require the product that I purchased the other day, can I return it?</h5>
                                    <p>If the item is unopened, in pristine condition and you have purchased it within the past 14 days you may return it to us. Again, you will need to send us an email (as above) and we will advise you what to do next. </p>
                                    <h5>Special Conditions:</h5>
                                    <p>Product supplied on a "No Return" basis can not be returned unless the product is faulty within the warranties imposed by statute and which cannot be excluded by agreement.</p>
                                    
                                    <h5>Product sold on the "No Returns" basis:</h5>
                                    <p>* any clearance stock, unless faulty</p>
                                    <p>* special promotions</p>
                                    <p>* some brands</p>
                                    </p>
                                    <p> As of March 1 2006, the following Brands and technologies became excluded from our 14 day no quibble return policy:</p>
                                    <p>* Components - AMD CPU's, Intel CPU's</p>
                                    <p>* All memory modules (Acer, Crucial, IBM, Hewlett Packard, Kingston, Toshiba), all hard drives (Acer, IBM, HP, Maxtor and Seagate) and Western Digital</p>
                                    <p>* All software licensing media kits and Microsoft system builders OEM range</p>
                                    <p>* Computer Systems - any special build on desktops and servers, and all server accessories (Acer, IBM, and Hewlett Packard)</p>
                                    <p>* Networking products from Cisco, Juniper, Motorola and configure to order APC racks</p>
                                    </p>
                                    <h5>What happens if I no longer have the packaging for the product that I am going to return?</h5>
                                    <p>Unless the item is faulty we cannot accept the product back as it is not unopened and in pristine condition. If the item is faulty please package the product as securely as possible and organise a return as per the instructions above. </p>
                                    <h5>Can I get a refund on a faulty product?</h5>
                                    <p>If the fault has been reported within 1 month of the purchase date you can request a refund of the purchase price of the product. Otherwise we will replace the item with the same or equivalent within the conditions of the warranty. If the equivalent item is not suitable, you can get a refund. </p>
                                    <h5>Can I get a forward replacement?</h5>
                                    <p>You can request a replacement product to be sent to you before you return the faulty product. This replacement will be added to your account and you will be given a period of 10 working days to return the faulty product before an invoice is raised for the replacement. </p>
                                    <h5>Who pays for the cost of returning the products?</h5>
                                    <p>If the product is not faulty or has developed a fault more than 1 month after purchase you will be required to pay for the cost of shipping. If the product is faulty and it has been reported with 1 month of purchasing, we will organise a courier to pick this up from you and deliver it back to our warehouse.
                                    </p>
                                    <p>If you cannot find what you are looking for or have a question not answered here, please do not hesitate to contact us. </p>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>

                <?php endif; ?>


            <?php endwhile; ?>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>