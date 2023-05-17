<?php
$default_img = get_stylesheet_directory_uri().'/assets/images/woocommerce-placeholder.png';
$service_heading = get_field('service_heading');
$service_desc = get_field('service_description');
$assign_services = get_field('assign_services');
$service_read_more_btn = get_field('service_read_more_btn')

?>
<?php if($assign_services){?>
<section class="our-services sectionWrap" id="services">
    <div class="container p-lg-0">
        <?php if($service_heading){?>
        <h2 class="sectionHeading"><?php echo $service_heading; ?><span>.</span></h2>
        <?php }?>

        <?php if($service_desc){?>
        <p class="contentCopy text-center"><?php echo $service_desc;?></p>
        <?php }

        ?>
        <div class="serviceRow">
            <div class="serviceCardGrp card-deck">
                <!--------------- fetching here---------------------------------->
            <?php foreach ($assign_services as $services_obj ) { 
                ?>
                <!----------------- for getting featured image url against post id-------------------------- -->
                <?php 
                  $service_logo = wp_get_attachment_url(get_post_thumbnail_id($services_obj->ID) );
                  $service_img =  $service_logo?$service_logo:$default_img;
                 ?>
                <div class="card text-center serviceCard">
                    <div class="card-body">
                        <div class="logoWrap">
                            <img class="serviceLogo card-img" src="<?php echo $service_img; ?>" alt="service logo" />
                        </div>
                    
                        <a class="serviceLink" href="">
                            <h4 class="serviceName"><?php echo $services_obj->post_title;?></h4>
                        </a>
                        <p class="card-text serviceDesc"><?php echo $services_obj->post_excerpt; ?></p>
                    </div>
                    <?php if($service_read_more_btn){?>
                        <div class="card-footer serviceFooter bg-white">
                            <a class="ctaBtn" href="<?php echo get_the_permalink($services_obj->ID);?>"><?php echo $service_read_more_btn;?>
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    <?php }?>
                </div>
                <?php }?>
            </div>
           
        </div>
    </div>
</section>
<?php }?>