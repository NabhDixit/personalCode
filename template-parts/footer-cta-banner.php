<?php $footer_banner_title = get_field('footer_banner_title','option');
 $footer_banner_button_url = get_field('footer_banner_button_url','option');
 $footer_banner_button = get_field('footer_banner_button','option');
 $footer_banner_content=get_field('footer_banner_content','option');?>

<?php if($footer_banner_title || $footer_banner_button || $footer_banner_content) {?>
<section class="cta-banner-two sectionWrap"> 

  <div class="container p-lg-0">
    <div class="ctaBg">
      <div class="ctaBannerWrap">
        <div class="ctaBannerColWrap">
            <h4 class="ctaBannerTitle"><?php echo $footer_banner_title;?></h4>
            <p class="contentCopy"><?php echo $footer_banner_content; ?></p>
        </div>
        <a href="<?php echo $footer_banner_button_url;?>" class="ctaBtn"><?php echo $footer_banner_button;?></a>
      </div>
    </div>
  </div>
  
</section>
<?php }?>