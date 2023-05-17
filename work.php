<?php
// Template Name: Work 
get_header();
$work_title = get_field('work_title');
$contentLink = get_sub_field('contentLink');
?>

<div id="work">
    <div class="workWrap">
        <div class="container p-lg-0">
            <h1 class="sectionHeading"><?php echo $work_title;?><span>.</span></h1>
            <div class="projTabs">
                <ul class="nav nav-tabs nav-pills mb-3" id="pills-tab" role="tablist">

                    <?php $count = 0;
                    while(have_rows('work_section')) {the_row();?>
                        <li class="nav-item">
                            <a class="nav-link <?php 
                            if($count==0){
                              echo "active";  
                            }?>" id="<?php echo str_replace(' ','-',get_sub_field('tabTitle')).'-'.$count;?>" data-toggle="pill" 
                                href="#<?php echo str_replace(' ','-',get_sub_field('tabTitle'));?>" role="tab" aria-controls="<?php echo str_replace(' ','-',get_sub_field('tabTitle'));?>" aria-selected="true">
                                <?php echo get_sub_field('tabTitle');?></a>
                        </li>
                      
                    <?php 
                        $count++;               
                    }?>    

                </ul>
                <div class="tab-content mt-5" id="pills-tabContent">
                    <?php $count2 = 0;
                     while(have_rows('work_section')){the_row();
                        $checked_data = get_sub_field('check');
                        $is_checked = false;
                        if($checked_data && in_array('yes', $checked_data)) {
                            $is_checked = true;
                        }
                     ?>
                        <div class="tab-pane fade <?php if($count2==0){ echo 'show active';} ?>" id="<?php echo str_replace(' ','-',get_sub_field('tabTitle'));?>" role="tabpanel" 
                                aria-labelledby="<?php echo str_replace(' ','-',get_sub_field('tabTitle'));?>">
                            <div class="projTabs">
                                <div class="projectWrap card-deck">
                                    <?php while(have_rows('tabProject')){ the_row(); 
                                        $for_mobile = get_sub_field('for_mobile');
                                        $is_mobile = false;
                                        if($for_mobile && in_array('mobile', $for_mobile)){
                                            $is_mobile = true;
                                        }
                                        ?>
                                    <div class="card projCard">
                                        <img class="projImg" src="<?php echo get_sub_field('contentImage');?>" alt="">
                                        <div class="projDetail">
                                            <h4><?php echo get_sub_field('contentTitle');?></h4>
                                            <?php if(!$is_checked && !$is_mobile) { ?>
                                                <a class="ctaBtn" target="_blank" href="<?php echo $contentLink;?>">
                                                    <?php echo get_sub_field('contentButton');?>
                                                    <font-awesome-icon :icon="['fa', 'external-link-alt']"></font-awesome-icon>
                                                </a>
                                            <?php } ?>

                                            <?php if($is_checked || $is_mobile) { ?>
                                            <div class="badgeRow">
                                                <a class="appBadge" href="" target="_blank">
                                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/clients/download-on-the-app-store-en-us/black.svg" alt="">
                                                </a>
                                                <a class="appBadge" href="" target="_blank">
                                                    <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/clients/google-play-badge.svg" alt="">
                                                </a>
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
        
                            </div>
                        </div>
                    <?php 
                   $count2++;
                }?>    
                   
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>