<?php $footer_logo = get_field('footer_logo','option');
$footer_content = get_field('footer_content','option');
$fb_link = get_field('footer_facebook_url','option');
$ld_link = get_field('footer_linkdin_url','option');

$column_1_heading = get_field('column_1_heading','option');
$column_2_heading = get_field('column_2_heading','option');
$footer_address = get_field('footer_address','option');

$header_email = get_field('header_email','option');
$header_phoneNum = get_field('header_phone_number','option');

$footer_copyright = get_field('footer_copyright','option');

?>

<?php if($footer_logo && $footer_content){?>

<?php if(!is_page_template('contact-us.php')){ ?>
    <!-- footer cta banner -->
    <?php get_template_part('template-parts/footer-cta-banner'); ?>
<?php } ?>

<section class="footer-comp sectionWrap">
  <div class="container p-lg-0">
    <footer class="cstmFooter">

   
      <div class="cstmCol colOne">

        <img class="footerLogo" src="<?php echo $footer_logo;?>" alt="">
        <p><?php echo $footer_content;?></p>
        <?php if($fb_link && $ld_link) {?>
           <div class="socialBar">
              <a href="<?php echo $fb_link;?>" target="_blank">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
              </a>
              <a href="<?php echo $ld_link;?>" target="_blank">
                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
              </a>
          </div>
        <?php }?>  
      </div>
    

    <?php if($column_1_heading){?>
      <div class="cstmCol colTwo">
        <h4><?php echo $column_1_heading;?></h4>

        <?php   wp_nav_menu(array(
                    'menu' => 'Footer Menu',
                    'depth' => 3,
                    'container' => false,
                    'menu_class' => 'quickLinks' //ul ki class
                    )
                ); ?>
        <!-- <ul class="quickLinks">
          <li>
            <a href="">Home</a>
          </li>
          <li>
            <a href="">About Us</a>
          </li>
          <li>
            <a href="">Work</a>
          </li>
          <li>
            <a href="">Career</a>
          </li>
          <li>
            <a href="">Contact Us</a>
          </li>
          <li>
            <a href="">Blog</a>
          </li>
        </ul> -->
      </div>
    <?php }?>


    <?php if($column_2_heading && $footer_address && $header_phoneNum && $header_email){?>
      <div class="cstmCol colThree">
        <h4><?php echo $column_2_heading;?></h4>
        <ul class="contactLinks">
          <li>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <a href="http://maps.google.com/?q=<?php echo $footer_address;?>" target="_blank">
                <?php echo $footer_address;?>
            </a>
          </li>
          <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <a href="tel:<?php echo $header_phoneNum;?>"><?php echo $header_phoneNum;?></a>
          </li>
          <li>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <a href="mailTo:<?php echo $header_email;?>"><?php echo $header_email;?></a>
          </li>
        </ul>
      </div>
    <?php }?>  
    </footer>
    
    <div class="hrLine"></div>
    <?php if($footer_copyright){?>
    <div class="copyrightWrap">
      <p><?php echo $footer_copyright;?></p>
    </div>
    <?php }?>
  </div>
</section>
<?php }?>
<?php wp_footer() ;?>