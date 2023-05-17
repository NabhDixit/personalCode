<?php

function enqueue_myfiles() {
    
    /***** Add Conditional enqueues here *****/

    // homepage styles & scripts
    if(is_front_page()){
        wp_enqueue_style('home-css', get_stylesheet_directory_uri(). '/css/home.css', array(), '1.0');
        wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/assets/third-party-lib/js/owl.carousel.min.js', array(), time(), true);
        wp_enqueue_style('owl-style', get_stylesheet_directory_uri(). '/assets/third-party-lib/css/owl.carousel.min.css', array(), '1.0');
        wp_enqueue_style('owl-theme', get_stylesheet_directory_uri(). '/assets/third-party-lib/css/owl.theme.default.min.css', array(), '1.0');
    }

    // about us page
    if(is_page_template('about-us.php')){
        wp_enqueue_style('about-css', get_stylesheet_directory_uri(). '/css/aboutUs.css', array(), '1.0');
    }

    // contact us
    if(is_page_template('contact-us.php' || 'carrier.php')){ 
        wp_enqueue_style('contact-css', get_stylesheet_directory_uri(). '/css/contact.css', array(), '1.0');
    }

    // blogs
    if(is_page_template('blogs.php')){ 
        wp_enqueue_style('blogs-css', get_stylesheet_directory_uri(). '/css/blogs.css', array(), '1.0');
    }

    // blog single page
    if(is_single()){
        wp_enqueue_style('blog-single-css', get_stylesheet_directory_uri(). '/css/singlePage.css', array(), '1.0');
    }

    // work page
    if(is_page_template('work.php')){ 
        wp_enqueue_style('work-css', get_stylesheet_directory_uri(). '/css/work.css', array(), '1.0');
        wp_enqueue_script('popper-js', get_stylesheet_directory_uri() . '/assets/third-party-lib/js/popper.min.js', array(), time(), true);
        wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/assets/third-party-lib/js/bootstrap.min.js', array(), time(), true);
    }

    // services single page
    if(is_singular('services')){
        wp_enqueue_style('service-single-css', get_stylesheet_directory_uri(). '/css/singleService.css', array(), '1.0');
        wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/assets/third-party-lib/js/owl.carousel.min.js', array(), time(), true);
        wp_enqueue_style('owl-style', get_stylesheet_directory_uri(). '/assets/third-party-lib/css/owl.carousel.min.css', array(), '1.0');
        wp_enqueue_style('owl-theme', get_stylesheet_directory_uri(). '/assets/third-party-lib/css/owl.theme.default.min.css', array(), '1.0');
    }

    /***** Add common enqueues here *****/
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri(). '/assets/third-party-lib/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri(). '/assets/fonts/font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('menu-css', get_stylesheet_directory_uri(). '/css/topMenu.css', array(), '1.0');
    wp_enqueue_style('footer-css', get_stylesheet_directory_uri(). '/css/footerComp.css', array(), '1.0');
    wp_enqueue_style('common-css', get_stylesheet_directory_uri(). '/css/common.css', array(), '1.0');
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), time(), true);
    wp_localize_script('main-js', 'localdata', array(
        'styleSheetUrl' => get_stylesheet_directory_uri(),
        'ajaxurl' => admin_url( 'admin-ajax.php' )
        )
    );
}
add_action( 'wp_enqueue_scripts', 'enqueue_myfiles' );

/***** DEQUEUE WORDPRESS DEFAULT STYLES *****/

if (!function_exists("dequeue_parent_styles")) {
    function dequeue_parent_styles()
    {
        wp_dequeue_style("twenty-twenty-one-style");
        wp_deregister_style("twenty-twenty-one-style");
        wp_dequeue_style("wp-block-library");
        wp_dequeue_style("classic-theme-styles");
        wp_dequeue_style("global-styles");
        wp_dequeue_style("wc-blocks-vendors-style");
        wp_dequeue_style("wc-blocks-style");
        wp_dequeue_style("woocommerce-layout");
        wp_dequeue_style("woocommerce-smallscreen");
        wp_dequeue_style("woocommerce-general");
        wp_dequeue_style("twenty-twenty-one-print-style");
        wp_dequeue_style("dashicons");
    }
}

add_action("wp_print_styles", "dequeue_parent_styles");

/***** ADD CUSTOM CLASS IN GRAVITY FORM SUBMIT BUTTON *****/
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button ctaBtn gform_button' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}

/***** REMOVE WP_HEAD UNUSED INDEX CSS *****/
function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
} 
add_action('get_header', 'my_filter_head');


// custom Post type-----------------------------------------------------------------------
function create_custom_post_type(){
	$supports = array('title','editor','author','thumbnail','excerpt','custom-fields','comments','revisions', 'post-formats', 
		);
	$labels = array(
		'name' => _x('Services', 'plural'),
		'singular_name' => _x('services', 'singular'),
		'menu_name' => _x('services', 'admin menu'),
		'name_admin_bar' => _x('services', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New services'),
		'new_item' => __('New services'),
		'edit_item' => __('Edit services'),
		'view_item' => __('View services'),
		'all_items' => __('All services'),
		'search_items' => __('Search services'),
		'not_found' => __('No services found.'),
		);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'show_in_navigation_menu'=>true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'services'),
	);
	register_post_type('services',$args); 
}
add_action( 'init' , 'create_custom_post_type');

// add theme options-----------------------------------------------------

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(

		'page_title' 	=> 'Theme Settings',

		'menu_title'	=> 'Theme Settings',

		'menu_slug' 	=> 'theme-general-settings',

		'capability'	=> 'edit_posts',

		'redirect'		=> false

	));

 }
 if( function_exists('acf_add_options_sub_page') ) {
    acf_add_options_sub_page(array(

		'page_title' 	=> 'Theme Header Settings',

		'menu_title'	=> 'Header',

		'parent_slug'	=> 'theme-general-settings',

	));
    acf_add_options_sub_page(array(

		'page_title' 	=> 'Theme Footer Settings',

		'menu_title'	=> 'Footer',

		'parent_slug'	=> 'theme-general-settings',

	));
    acf_add_options_sub_page(array(

		'page_title' 	=> 'Theme Search Settings',

		'menu_title'	=> 'Search Page',

		'parent_slug'	=> 'theme-general-settings',

	));
	acf_add_options_sub_page(array(

		'page_title' 	=> 'Theme Blogs Settings',

		'menu_title'	=> 'Blogs',

		'parent_slug'	=> 'theme-general-settings',

	));
}	


// disable for posts
// add_filter('use_block_editor_for_post', '__return_false', 10);

// // disable for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);

// // Disables the block editor from managing widgets in the Gutenberg plugin.
// add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// // Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
// add_filter( 'use_widgets_block_editor', '__return_false' );

// hook for Loadmore Ajax include------------------------
add_action( 'wp_ajax_load_more_function', 'getData' );
add_action( 'wp_ajax_nopriv_load_more_function', 'getData' );

function getData() {
    $default_img = get_stylesheet_directory_uri().'/assets/images/woocommerce-placeholder.png';
    $blog_ids = array();
    $args = array (
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page'=>3,
    'paged' => $_POST['paged'],
    'orderby'   => 'meta_value',
    'order' => 'ASC',
  );
  $all_posts = new Wp_Query($args);
  if($all_posts->have_posts()) {
      while($all_posts->have_posts()) {
          $all_posts->the_post();
          array_push($blog_ids,get_the_ID());
      } //close while loop 
  }

 foreach ($blog_ids as $assign_blogs_id) {?>
                            
    <?php $author_id=$post->post_author;?>
    <?php $blog_img =    wp_get_attachment_url(get_post_thumbnail_id($assign_blogs_id));//getting featured image   
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
            
            <a href="<?php echo get_the_permalink($assign_blogs_id);?>" class="ctaBtn"><?php echo __('Read More');?></a>
    </div>
<?php }
  exit;
}  


