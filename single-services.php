<?php get_header(); 
global $post;
// print_r($post);
$portfolio_btn = get_field('service_banner_portfolio_btn',get_the_ID());
$contact_btn = get_field('service_banner_contact_btn',get_the_ID());
$contact_btn_url = get_field('contact_btn_url',get_the_ID());
$portfolio_btn_url = get_field('view_portfolio_url',get_the_ID());
$service_banner_logo = get_field('service_banner_logo',get_the_ID());

$about_service_title = get_field('about_service_title',get_the_ID());
$about_service_desc = get_field('about_service_desc',get_the_ID());
$work_button = get_field('work_button',get_the_ID());
$work_button_url = get_field('work_button_url',get_the_ID());
$work_image = get_field('work_image',get_the_ID());

// wordpress services---------------------------
$service_title = get_field('service_title',get_the_ID());
$service_desc = get_field('service_desc',get_the_ID());


?>


<div class="servSngl" id="service-single">
    <!-- banner -->
    <?php if($service_banner_logo && $portfolio_btn && $contact_btn){?>
        <div class="servBnrWrp">
            <div class="container p-lg-0">
                <div class="servBnr">
                    <div class="servBnrColOne">
                        <h1 class="bannerTitle"><?php echo $post->post_title;?></h1>
                        <p class="bannerDesc"><?php echo $post->post_excerpt;?></p>
                        <div class="ctaSec">
                            <a class="ctaBtn servCtaOne" href="<?php echo $portfolio_btn_url;?>"><?php echo $portfolio_btn;?></a>
                            <a class="ctaBtn servCtaTwo" href="<?php echo $contact_btn_url;?>"><?php echo $contact_btn;?></a>
                        </div>
                    </div>
                    <div class="servBnrColTwo">
                        <img class="servBnrImg" src="<?php echo $service_banner_logo;?>" alt="">
                    </div>
                </div>
            </div>
            <div class="bnrTilt">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M1200 0L0 0 598.97 114.72 1200 0z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
    <?php }?>    
    <!-- about section -->
    <?php if($about_service_title && $about_service_desc && $work_button && $work_image){?>
        <section class="abtServSec sectionWrap">
            <div class="container p-lg-0">
                <div class="abtServRow">
                    <div class="abtColOne">
                        <h2 class="sectionHeading"><?php echo $about_service_title;?><span>.</span></h2>
                        <p class="contentCopy"><?php echo $about_service_desc;?></p>
                        <a class="ctaBtn" href="<?php echo $work_button_url;?>"><?php echo $work_button;?></a>
                    </div>
                    <div class="abtColTwo" v-if="sgSerAbout.abSerImg">
                        <img src="<?php echo $work_image;?>" alt="">
                    </div>
                </div>
            </div>
        </section>
    <?php }?>    
    <!-- services section-->
    <?php if(have_rows('service_detail')){?>
        <section class="servSec sectionWrap" v-if="servData">
            <div class="servSecWaves">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="container p-lg-0">
                <h2 class="sectionHeading"><?php echo $service_title;?><span>.</span></h2>
                <p class="contentCopy"><?php echo $service_desc;?></p>
                <div class="servSecRow">
                    <?php while(have_rows('service_detail')){ the_row();?>
                        <div class="servCard">
                            <div class="rowOne">
                                <img class="servIcon" src="<?php echo get_sub_field('service_logo');?>" alt="">
                                <h4 class="servTtl"><?php echo get_sub_field('service_inner_tilte');?></h4>
                            </div>
                            <div class="rowTwo">
                                <p class="servDesc contentCopy"><?php echo get_sub_field('service_inner_desc');?></p>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="servSecWaves">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
    <?php }?>    
    <!-- client slider -->
    <?php
    $client_heading = get_field('client_heading');
    $client_section = get_field('clients_section');
    if($client_heading && $client_section) { ?>
    <section class="cltServSec sectionWrap">
        <div class="cltServRow">
            <div class="headWrap">
                <h2 class="sectionHeading"><?php echo $client_heading;?></h2>
            </div>
            <?php 
            $pageid = get_the_ID();
            get_template_part('template-parts/client-slider','',array('paged_id' => $pageid,'pageType'=>'services')); ?>
        </div>
    </section>
    <?php }?>
    <!-- process section -->
    <?php if(have_rows('strategy_and_planning')){?>
        <section class="procServSec sectionWrap">
            <div class="procServTilt">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="container p-lg-0">
                <div class="procServRow">
                    <?php if(!wp_is_mobile()){ ?>
                        <!-- desktop view -->
                        <ul class="procList deskProcList">
                            <?php while(have_rows('strategy_and_planning')) {the_row();?>
                                <li class="procItem">
                                    <span><?php echo get_sub_field('strategy_and_planning_title');?></span>
                                    <img src="<?php echo get_sub_field('strategy_and_planning_image');?>" alt="">
                                    <p class="contentCopy"><?php echo get_sub_field('strategy_and_planning_desc');?></p>
                                </li>
                            <?php }?>    
                        </ul>
                    <?php } else { ?>
                        <!-- mobile view -->
                        <ul class="procList mobProcList">
                            <?php while(have_rows('strategy_and_planning')) {the_row();?>
                                <li class="procItem">
                                    <img src="<?php echo get_sub_field('strategy_and_planning_image');?>" alt="">
                                    <div class="mobProcDtl">
                                        <span><?php echo get_sub_field('strategy_and_planning_title');?></span>
                                        <p class="contentCopy"><?php echo get_sub_field('strategy_and_planning_desc');?></p>
                                    </div>
                                </li>
                            <?php }?>    
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="procServTilt">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
    <?php }?>  
    <!-- work section -->
    <?php
    $our_works_title = get_field('our_works_title'); 
    if(have_rows('our_works_detail')){?>
        <section class="wrkServSec sectionWrap">
            <div class="container p-lg-0">
                <h2 class="sectionHeading"><?php echo $our_works_title;?><span>.</span></h2>
                <div class="workSldr owl-carousel owl-theme">
                    <?php while(have_rows('our_works_detail')) {the_row();?>
                        <div class="item">
                            <div class="wrkSldrWrp">
                                <div class="sldrCol wrkImgBox">
                                    <img class="wrkImg" src="<?php echo get_sub_field('our_works_image');?>" alt="">
                                </div>
                                <div class="sldrCol wrkdtl">
                                    <h4 class="sldrTtl"><?php echo get_sub_field('our_works_project_title');?></h4>
                                    <p class="contentCopy"><?php echo get_sub_field('our_works_project_desc');?></p>
                                    <div class="dtlBtnRow">
                                        <a class="ctaBtn" href=""><?php echo get_sub_field('portfolio_btn');?></a>
                                        <a class="ctaBtn" href=""><?php echo get_sub_field('contact_btn');?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>    
                </div>
            </div>
            <div class="wrkServWaves">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
        </section>
    <?php }?>    
    <!-- ensure section -->
    <?php 
    $our_projects_title = get_field('our_projects_title');
    $lets_connect_btn_url = get_field('lets_connect_btn_url');
    $lets_connect_btn = get_field('lets_connect_btn');
    if('our_projects_detail'){ ?>
        <section class="ensrServSec sectionWrap">
            <div class="container p-lg-0">
                <?php if($our_projects_title){?>
                <h2 class="sectionHeading"><?php echo $our_projects_title;?><span>.</span></h2>
                <?php }?>
                <div class="ensrSecRow">
                    <?php while(have_rows('our_projects_detail')) {the_row();?>
                        <div class="ensrCard">
                            <div class="rowOne">
                                <img class="ensrIcon" src="<?php echo get_sub_field('our_projects_logo');?>" alt="">
                                <h4 class="ensrTtl"><?php echo get_sub_field('our_projects_title');?></h4>
                            </div>
                            <div class="rowTwo">
                                <p class="ensrDesc contentCopy"><?php echo get_sub_field('our_projects_desc');?></p>
                            </div>
                        </div>
                    <?php }?>    
                    <!-- <div class="ensrCard">
                        <div class="rowOne">
                            <img class="ensrIcon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tech-icons/html-5.png" alt="">
                            <h4 class="ensrTtl">Great UI/UX</h4>
                        </div>
                        <div class="rowTwo">
                            <p class="ensrDesc contentCopy">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco.</p>
                        </div>
                    </div> -->
                </div>
                <?php if($lets_connect_btn_url && $lets_connect_btn){?>
                <a class="ctaBtn" href="<?php echo $lets_connect_btn_url;?>"><?php echo $lets_connect_btn;?></a>
                <?php }?>
            </div>
        </section>
    <?php }?>   

    <!-- service benefits section -->
    <?php get_template_part('template-parts/service-benefits'); ?> 
    
    <!-- testimonials -->
    <?php 
    $pageid = get_the_ID();
    get_template_part('template-parts/testimonial-slider','',array('paged_id' => $pageid,'pageType'=>'services')); ?>
</div>

<?php get_footer(); ?>