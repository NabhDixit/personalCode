<?php $testimonials_heading = get_field('testimonials_heading');
$testimonials_title = get_field('testimonials_title');
$testimonials_description = get_field('testimonials_description');
$testimonials_section = get_field('testimonials_section')
?>
<?php if(have_rows('testimonials_section')){?>
<section class="testimonials sectionWrap">
    <div class="testimonialWrap">
        <div class="container p-lg-0">
            <div class="testRow">
                <?php if($testimonials_heading && $testimonials_description) {?>
                <div class="colOne">
                    <h2 class="sectionHeading"><?php echo $testimonials_heading;?><span>.</span></h2>
                    <p class="contentCopy"><?php echo $testimonials_description;?></p>
                </div>
                <?php }?>

                <?php if($testimonials_title) {?>
                <div class="colTwo">
                    <h4 class="subHeading"><?php echo $testimonials_title;?></h4>

                    
                    <div class="testimonial-slider owl-carousel owl-theme">

                    <?php while(have_rows('testimonials_section')){ the_row();?>
                        <div class="card testiCard">
                            <div class="card-body testiBody">
                                <p class="card-text"><?php echo get_sub_field('testimonials_message')?></p>
                            </div>
                            <div class="card-footer testiFooter bg-transparent">
                                <span class="testiDesig"><?php echo get_sub_field('testimonials_designation');?></span>
                                <em class="testiComp"><?php echo get_sub_field('testimonials_company_name');?></em>
                            </div>
                        </div>
                    <?php }?>    
                    </div>
                    <?php }?>
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php }?>