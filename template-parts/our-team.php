<?php
$team_heading = get_field('team_heading');
$team_desc = get_field('team_desc');
$team_details = get_field('team_details'); 
$default_img = get_stylesheet_directory_uri().'/assets/images/defaultuser.png';

if(have_rows('team_details')){ ?>
    <section class="our-team sectionWrap">
        <div class="container p-lg-0">
            <?php if($team_heading) {?>
            <h2 class="sectionHeading"><?php echo $team_heading;?><span>.</span></h2>
            <?php }?>
            <?php if($team_desc) {?>
            <p class="contentCopy"><?php echo __($team_desc,'believintech');?></p>
            <div class="teamWrap">
            <?php }?>    
                <?php while(have_rows('team_details')) {the_row();?>
                    <div class="teamDepart">
                        <h5 class="departTitle"><?php echo get_sub_field('teams_heading');?></h5>

                        <div class="teamGroup">

                            <?php while(have_rows('team_information')) {the_row();?>
                                <div class="teamCardWrap">
                                    <?php $member_image = get_sub_field('memberimage');
                                    $member_img = $member_image?$member_image:$default_img;?>
                                    <div class="memberImgWrap">
                                        <img class="teamImg" src="<?php echo $member_img;?>">
                                    </div>
                                    <div class="memberDetails">
                                        <?php $membername = get_sub_field('membername');
                                        if($membername){?>
                                        <h4><?php echo $membername;?></h4>
                                        <?php }?>
                                        <?php $memberdesignation = get_sub_field('memberdesignation');
                                        if($memberdesignation){?>
                                        <span><?php echo $memberdesignation;?></span>
                                        <?php }?>

                                        <?php $memberlinkedin = get_sub_field('memberlinkedin');
                                        if($memberlinkedin) {?>
                                        <a class="memberSocial" href="<?php echo $memberlinkedin;?>" target="_blank">
                                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        </a>
                                        <?php }?>

                                    </div>
                                </div>
                            <?php }?>    
                        </div>
                    </div>
                <?php }?>    
            </div>
        </div>
    </section>
<?php }?>    