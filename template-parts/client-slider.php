<?php $clients_tab_heading = get_field('clients_tab_heading');
 $clients_tab_description = get_field('clients_tab_description');

 $client_section = get_field('clients_section');
?>
<?php if(have_rows('clients_section')){?>
<section class="client-slider sectionWrap">

  <?php if($clients_tab_heading) {?>
  <h2 class="sectionHeading"><?php echo $clients_tab_heading;?><span>.</span></h2>
  <?php }?>

  <div class="clientWrap">
  <?php if($clients_tab_description) {?>
    <p class="contentCopy text-center"><?php echo $clients_tab_description;?></p>
  <?php }?>
  
    
      <div class="clientSlider owl-carousel owl-theme">

        <?php while(have_rows('clients_section')){ the_row();?>
        <div class="item">
            <img src="<?php echo get_sub_field('clients_images');?>" alt="">
        </div>
        <?php }?>  
      </div>
  
  </div>
</section>
<?php }?>  