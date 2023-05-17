<?php
/* Template Name: Carrier */
get_header();
$carrier_title = get_field('career_title');
$carrier_desc = get_field('career_desc');
$career_banner_image = get_field('career_banner_image');

$hiring_title = get_field('hiring_title');
$hiring_description = get_field('hiring_description');
$carrier_form_shortcode = get_field('carrier_form_shortcode');
?>

<style>
    .contactWrap .bannerWrap{
        gap: calc(100% - 95%);
        flex-direction: row-reverse;
    }
    .contactWrap .bannerWrap .colOne{
        width: 40%;
    }
    .contactWrap .bannerWrap .colTwo{
        width: 55%;
    }
    @media screen and (max-width: 991px) {
        h1.bannerTitle{
            text-align: center;
        }
        .contactWrap .bannerWrap{
            flex-direction: column-reverse;
        }
        .contactWrap .bannerWrap .colOne{
            width: 100%;
        }
        .contactWrap .bannerWrap .colTwo{
            width: 100%;
            display: block;
        }
    }
</style>

<div class="contactWrap">
    <div class="container p-lg-0">
        <div class="bannerWrap">
            <div class="colOne">
                <div class="formWrap">
                    <div class="contact-form">
                        <div class="fieldWrap">
                            <?php if($carrier_form_shortcode){ ?>
                                <?php echo  do_shortcode($carrier_form_shortcode);?>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>
            <?php if($career_banner_image){ ?>
                <div class="colTwo">
                    <h1 class="bannerTitle"><?php echo $carrier_title; ?></h1>
                    <img src="<?php echo $career_banner_image;?>" alt="believintech career">
                </div>
            <?php } ?>    
        </div>
    </div>
</div>

 <!-- do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="49"]'); -->
<?php get_footer(); ?>

