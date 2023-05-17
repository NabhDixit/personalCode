<?php get_header(); 


$post_id = get_the_id();
$date_format = get_option('date_format');
$author_id=$post->post_author;
$twenty_twenty_one_comment_count = get_comments_number();

$post_img = wp_get_attachment_url( get_post_thumbnail_id($post_id ));
$url=get_permalink();
// echo $url;
?>
<?php if($post_id){?>
    <section class="single-page">
      <div id="singlePg" class="singlePgWrap">
        <?php if($post_img){?>
          <div class="bannerWrap">
            <img src="<?php echo $post_img;?>" alt="">
          </div>
        <?php }?>  
        <div class="container p-lg-0">
          <div class="singleMain">
            <?php if($date_format && $author_id ){?>
                <div class="singleContHead">
                  <h2 class="singleTitle"><?php the_title();?></h2>
                  <span class="blogDetailWrap">
                    <span class="pubDate"><?php echo get_the_date( $date_format,$post_id)?></span>
                    <span class="pubAuthor"><?php the_author_meta( 'user_nicename' , $author_id ); ?> </span>
                  </span>
                </div>
            <?php }?>  
            <div class="contentWrap">
              <aside class="socialSec">
                <span>Share</span>
                <div class="singleSocial">
                  <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                  </a>
                  <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>">
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                  </a>
                </div>
              </aside>
              <main class="mainSec">
                <p class="contentCopy"><?php the_content();?></p>
              </main>
            </div>
            <div class="commentSec">
                <?php if($twenty_twenty_one_comment_count > 0) { ?> 
                    <h2 class="commentsTitle">Comments</h2>
                <?php } ?>
                <?php comments_template(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php }?> 

<?php get_footer(); ?>