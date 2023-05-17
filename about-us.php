<?php 

/* Template Name: About Us */

get_header();
$about_banner_title = get_field('about_banner_title');
$about_banner_desc = get_field('about_banner_desc');
$about_banner_cta_button = get_field('about_banner_cta_button');
$about_banner_image = get_field('about_banner_image');
$about_banner_cta_button_url = get_field('about_banner_cta_button_url');

$vision_title = get_field('vision_title');
$vision_desc = get_field('vision_desc');
$vision_image = get_field('vision_image');
?>

<?php if($about_banner_title && $about_banner_desc && $about_banner_cta_button){?>
<div class="aboutBanner">
    <div class="container p-lg-0">
        <div class="bannerWrap">
            <?php if($about_banner_title && $about_banner_desc){?>
                <div class="colOne">
                    <h1 class="bannerTitle"><?php echo $about_banner_title;?></h1>
                    <p class="bannerDesc"><?php echo $about_banner_desc;?></p>
                    <a class="ctaBtn" href="<?php echo $about_banner_cta_button_url;?> ">
                        <?php echo $about_banner_cta_button;?>
                        <font-awesome-icon :icon="['fas', 'arrow-right']" />
                    </a>
                </div>
            <?php }?>
            
            <?php if($about_banner_image){?>
                <div class="colTwo">
                    <img src="<?php echo $about_banner_image;?>" alt="believintech about us">
                </div>
            <?php }?>    
        </div>
    </div>
</div>
<?php }?>

<?php if($vision_title && $vision_image && $vision_desc){?>
    <section class="vision sectionWrap">
        <div class="container p-lg-0">
            <div class="visionRow">
                    <div class="colOne">
                        <img src="<?php echo $vision_image;?>" alt="">
                    </div>
                <?php if($vision_title && $vision_desc){?>
                    <div class="colTwo">
                        <h2 class="sectionHeading"><?php echo $vision_title;?><span>.</span></h2>
                        <img src="" alt="">
                        <p class="contentCopy"><?php echo $vision_desc;?></p>
                    </div>
                <?php }?>    
            </div>
        </div>
    </section>
<?php }?>

<!-- cta banner three -->
<?php get_template_part('template-parts/cta-banner-three'); ?>

<!-- our team section -->
<?php get_template_part('template-parts/our-team'); ?>

<?php get_footer(); ?>