<?php
$cta_title = get_field('cta_title');
$cta_desc = get_field('cta_desc');
$cta_button = get_field('cta_button');
?>



<?php if($cta_title && $cta_desc && $cta_button){?>
      <section class="cta-banner-three">
        <div class="ctaWrap">
          <div class="container p-lg-0">
            <div class="bannerWrap">
              
              <?php if($cta_title && $cta_desc){?>
                <div class="colOne">
                  <h4 class="ctaBannerTitle"><?php echo $cta_title ;?></h4>
                  <p><?php echo $cta_desc;?></p>
                </div>
              <?php }?>  

              <?php if($cta_button) {?>
                <div class="colTwo">
                  <a class="ctaBtn" href=""><?php echo $cta_button;?>
                    <font-awesome-icon :icon="['fas', 'arrow-right']" />
                  </a>
                </div>
              <?php }?>  
            </div>
          </div>
        </div>
      </section>
<?php }?>    