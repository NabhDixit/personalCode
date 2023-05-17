<?php

/* Template Name: Frontpage */

get_header();
$banner_img = get_field('banner_image');
$banner_title = get_field('banner_title');
$banner_desc = get_field('banner_description');
$banner_cta_button = get_field('banner_cta_button');
$banner_cta_button_url = get_field('banner_cta_button_url');
$workflow_heading = get_field('work_flow_heading');
// technology-------------------
$technology_heading = get_field('technology_heading');
$tech_bg_image = get_field('technology_background_image');


?>
<style>
    .banner {
        background: url(<?php echo $banner_img;?>) no-repeat;
        background-position: center;
        background-size: cover;
    }
    .tech-stack .cstmBg {
        background: url(<?php echo $tech_bg_image;?>) no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    
    }
</style>

<!-- homepage banner -->

<section class="banner">
    <div class="container p-lg-0">
        <div class="bannerWrap">
            <div class="bannerContent">
                <?php if($banner_title){?>
                <h1 class="bannerTitle"><?php echo $banner_title;?></h1>
                <?php }?>

                <?php if($banner_desc){?>
                <p class="bannerDesc"><?php echo $banner_desc;?></p>
                <?php }?>

                <?php if($banner_cta_button && $banner_cta_button_url){?>
                <a class="ctaBtn" href="<?php echo $banner_cta_button_url;?>"><?php echo $banner_cta_button;?>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
                <?php }?>
                
            </div>
            <div class="bannerBg">
                <!-- <img v-bind:src="items.bannerImage" alt=""> -->

            </div>
            <a class="bannerDwnArrow" href="#services">
                <svg class="arrows">
                    <path class="a1" d="M0 0 L30 32 L60 0"></path>
                    <path class="a2" d="M0 20 L30 52 L60 20"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- our services section -->
<?php get_template_part('template-parts/our-services'); ?>

<!-- cta banner section -->
<?php get_template_part('template-parts/cta-banner-one'); ?>

<!-- process section -->
<?php if(have_rows('work_flow_section')){?>
<section class="process sectionWrap">
    <div class="container p-lg-0">

    <?php if($workflow_heading){?>
        <h2 class="sectionHeading"><?php echo $workflow_heading;?><span>.</span></h2>
    <?php }?> 
       <div class="processWrap">
         <?php 
            while(have_rows('work_flow_section')){ //div repeat ho rha h-----------------------
                    the_row();
                $work_flow_image = get_sub_field('work_flow_image');
                $work_flow_name = get_sub_field('work_flow_name');?>
                <?php if($work_flow_image && $work_flow_name){?>
                    <div class="step"> 
                    <img class="processIcon" src="<?php echo $work_flow_image;?>" alt="process image">
                    <span><?php echo $work_flow_name;?></span>
                    <img class="rightArrow" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/right-arrow-blue.png" alt="">
                    </div>
                <?php }?>    
            <!-- close while here -->
          <?php }?> 
        </div> 
        <!-- main div -->
    </div>
</section>
<?php } ?>

<!-- tech stack section -->
<?php if(have_rows('technology_section')){?>
<section class="tech-stack sectionWrap">
    <div class="cstmBg">
        <?php if($technology_heading){?>
        <h2 class="sectionHeading"><?php echo $technology_heading;?><span>.</span></h2>
        <?php }?> 
        <div class="container p-lg-0">
        
           <?php while(have_rows('technology_section')){ the_row();?>
            <div class="techWrap">
                <div class="colOne">
                    <h4><?php echo get_sub_field('technologies_title')?></h4>
                    <p><?php echo get_sub_field('technologies_description')?></p>
                </div>

                <?php if(have_rows('technologies_image_and_name')){?>
                <div class="colTwo">
                    <div class="stackWrap">

                    <?php while(have_rows('technologies_image_and_name')){ the_row();?>
                        <div class="tech">
                            <img class="techLogo" src="<?php echo get_sub_field('technologies_image')?>" 
                                 alt="technology logos">
                            <span class="techName"><?php echo get_sub_field('technologies_name')?></span>
                        </div>
                    <?php }?>   
                    </div>
                </div>
                <?php }?>
            </div>
            <?php }?>
        </div>
    </div>
</section>
<?php }?>

<!-- client slider -->
<?php
$pageid = get_the_ID();
get_template_part('template-parts/client-slider','',array('pageType'=>'home'));
?>

<!-- testimonials section -->
<?php 
get_template_part('template-parts/testimonial-slider','',array('pageType'=>'home')); ?>

<!-- blogs section -->

<?php 

$pageid = get_the_ID();
get_template_part('template-parts/blogs-cards','',array('paged_id' => $pageid,'pageType'=>'home'));


get_footer(); ?>