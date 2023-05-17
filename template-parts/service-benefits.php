<?php
$benefits_title = get_field('benefits_title');
$benefits_desc = get_field('benefits_desc');
$checked_benefits = get_field('benefits_checkbox');
?>

<?php $is_checked = false;
    if($checked_benefits && in_array('benefit', $checked_benefits)) {
        $is_checked = true;
    }?>
    <?php if($is_checked){?>
        <section class="serviceBenefitsSec">
            <div class="container">
                <div class="benefitsWrap">
                    <h2 class="benefitsTitle"><?php echo $benefits_title ;?></h2>
                    <p class="contentCopy"><?php echo $benefits_desc;?></p>
                    <?php if(have_rows('detail_benefits')){?>
                        <ul class="benefitsGrid">
                            <?php
                            while(have_rows('detail_benefits')){the_row(); ?>
                                <li class="benefitsGridItem">
                                    <div class="imgBox">
                                        <img src="<?php echo get_sub_field('benefit_image');?>" alt="">
                                    </div>
                                    <div class="benefitCopy">
                                        <h3 class="benefitName"><?php echo get_sub_field('benefit_name');?></h3>
                                        <p class="benefitDesc"><?php echo get_sub_field('detail_benefit_desc');?></p>
                                    </div>
                                </li>
                            <?php }?>    
                            <!-- <li class="benefitsGridItem">
                                <div class="imgBox">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tech-icons/wordpress.png" alt="">
                                </div>
                                <div class="benefitCopy">
                                    <h3 class="benefitName">Execution Architecture</h3>
                                    <p class="benefitDesc">We cautiously model each web application to guarantee elite and low framework costs.</p>
                                </div>
                            </li> -->
                            <!-- <li class="benefitsGridItem">
                                <div class="imgBox">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tech-icons/wordpress.png" alt="">
                                </div>
                                <div class="benefitCopy">
                                    <h3 class="benefitName">Execution Architecture</h3>
                                    <p class="benefitDesc">We cautiously model each web application to guarantee elite and low framework costs.</p>
                                </div>
                            </li> -->
                            <!-- <li class="benefitsGridItem">
                                <div class="imgBox">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tech-icons/wordpress.png" alt="">
                                </div>
                                <div class="benefitCopy">
                                    <h3 class="benefitName">Execution Architecture</h3>
                                    <p class="benefitDesc">We cautiously model each web application to guarantee elite and low framework costs.</p>
                                </div>
                            </li> -->
                        </ul>
                    <?php }?>
                </div>
            </div>
        </section>
    <?php }?>
