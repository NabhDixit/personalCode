<?php 
$default_img = get_stylesheet_directory_uri().'/assets/images/woocommerce-placeholder.png';
$blog_ids = array();//take a empty Array
$blog_main_heading ='';
$btn_text = '';
$paged_num = '';

//$paged_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if($args['pageType'] == 'blogs') {
    
    $condition = array (
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page'   => 3,
        'paged'=> 1,
        'orderby'   => 'meta_value',
        'order' => 'ASC',
    );
    $all_posts = new WP_Query($condition);
    if($all_posts->have_posts()) {
        while($all_posts->have_posts()) {
            $all_posts->the_post();
            array_push($blog_ids,get_the_ID());
        } //close while loop 
    }//inner if
    
}// main if close
else{
    $blog_ids = get_field('assign_blog',$args['paged_id']); 
    $blog_main_heading =  get_field('article_&_news_heading',$args['paged_id']);
}
// var_dump($args);
    $btn_text =  get_field('blog_cta_btn_text',$args['paged_id']);


//print_r($blog_ids);
?>
<?php if($blog_ids){ ?>
    <div class="blogWrap">
        <section class="blogs sectionWrap">
            <div class="container p-lg-0">
                <?php if($blog_main_heading){?>
                    <h2 class="sectionHeading"><?php echo $blog_main_heading;?><span>.</span></h2>
                <?php }?>
                <?php if(!wp_is_mobile()) { ?>
                    <!-- blog desktop cards homepage -->
                    <div class="blgCardGrp blgCardGrpDesk">
                        <?php foreach ($blog_ids as $assign_blogs_id) {?>
                            
                            <?php $author_id=$post->post_author;?>
                            <?php $blog_img = wp_get_attachment_url(get_post_thumbnail_id($assign_blogs_id));//getting featured image   
                                $blog_img1 = $blog_img?$blog_img:$default_img;
                                $date_format = get_option('date_format');?>
                            <div class="blogCard">
                                <img class="blogThumbnail" src="<?php echo $blog_img1;?> ">
                                <div class="blogDetailsWrap">
                                    <div class="blogDetails">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <?php echo get_the_date( $date_format,$assign_blogs_id)?>
                                    </div>
                                    <div class="blogDetails">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        <?php the_author_meta( 'user_nicename' , $author_id ); ?> 
                                    </div>
                                </div>
                                <h2 class="blogTitle">
                                    <a href="<?php echo get_the_permalink($assign_blogs_id);?>"><?php echo get_the_title($assign_blogs_id);?></a>
                                </h2>
                                <p class="blogContent contentCopy">
                                    <?php echo get_the_excerpt($assign_blogs_id);?>
                                </p>
                                <?php if($btn_text){?>
                                <a href="<?php echo get_the_permalink($assign_blogs_id);?>" class="ctaBtn"><?php echo $btn_text;?></a>
                                <?php }?>
                            </div>
                        <?php }?>    
                    </div>

                    <?php if($args['pageType'] == 'blogs'){?>
                        <div class="Xlodmore action_button" data-max-page="<?php echo $all_posts->max_num_pages; ?>" id="load-more">
                            <span class="load-all loadMoreBtn">Load more</span>
                        </div>
                    <?php }?>
                        <!-- <a href="#" class="load-all">Load more</a> -->
                    
                <?php } else {?>
    
                    <!-- blog mobile view home -->
                    <?php if($blog_ids){?>
                        <div class="mobBlogSlider blgCardGrp blgCardGrpMob owl-carousel owl-theme">
                        
                            <?php foreach ($blog_ids as $assign_blogs_id) {?>
                                <div class="item blogCard">
                                    <?php $author_id=$post->post_author;?>
                                    <?php $blog_img = wp_get_attachment_url(get_post_thumbnail_id($assign_blogs_id) ); 
                                        $date_format = get_option('date_format');
                                    ?>
                                        <img class="blogThumbnail" src="<?php echo $blog_img;?>">
                                        <div class="blogDetailsWrap">
                                            <div class="blogDetails">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                <?php echo get_the_date( $date_format,$assign_blogs_id)?>
                                            </div>
                                            <div class="blogDetails">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                <?php the_author_meta( 'user_nicename' , $author_id ); ?> 
                                            </div>
                                        </div>
                                        <h2 class="blogTitle">
                                            <a href="<?php echo get_the_permalink($assign_blogs_id)?>">
                                                <?php echo get_the_title($assign_blogs_id);?>
                                            </a>
                                        </h2>
                                        <p class="blogContent contentCopy">
                                            <?php echo get_the_excerpt($assign_blogs_id);?>
                                        </p>
                                        <?php if($btn_text){?>
                                        <a href="<?php echo get_the_permalink($assign_blogs_id)?>" class="ctaBtn"><?php echo $btn_text;?></a>
                                        <?php }?>
                                </div>
                            <?php }?>
                        </div>
                    <?php }?>
                <?php } ?>
                <!-- blogs card for blogs index page -->
                <!-- <div class="blgCardGrp blgPgCard">
                    <div class="blogCard">
                        <img class="blogThumbnail" src="">
                        <div class="blogDetailsWrap">
                            <div class="blogDetails">
                                <font-awesome-icon :icon="['fas', 'clock']" />
                                16 Apr 21
                            </div>
                            <div class="blogDetails">
                                <font-awesome-icon :icon="['fas', 'user-circle']" />
                                ARK
                            </div>
                        </div>
                        <h2 class="blogTitle">
                            <a href="">LATEST WEB TECHNOLOGY</a>
                        </h2>
                        <p class="blogContent contentCopy">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur iste praesentium in consequuntur repelat exercitationem...
                        </p>
                        <a href="" class="ctaBtn">Read More</a>
                    </div>
                </div> -->
            </div>
        </section>
    </div>


<!------------------- Pagination------------------- -->
   

<?php } ?>
 <?php  ?>