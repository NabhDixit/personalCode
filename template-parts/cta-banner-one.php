<?php $cta_image = get_field('cta_image');
$cta_heading = get_field('cta_heading');
$cta_button = get_field('cta_button');
$cta_button_url = get_field('cta_button_url');?>
<style>
  .cta-banner .ctaBg {
    background: url(<?php echo $cta_image;?>);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}
</style>

<?php if($cta_heading || $cta_button){?>
<section class="cta-banner sectionWrap">
  <div class="ctaBg">
    <div class="container p-lg-0">
      <div class="ctaBannerWrap">
      <?php if($cta_heading){?>
        <h4 class="ctaBannerTitle"><?php echo $cta_heading;?><span>.</span></h4>
       <?php }
       if($cta_button){
       ?> 
        <a class="ctaBtn" href="<?php echo $cta_button_url;?>"><?php echo $cta_button;?></a>
        <?php }?>
      </div>
    </div>
  </div>
</section>
<?php }?>