<?php
//Template Name: Blog
get_header(); ?>

<!-- blogs section -->
<?php
$page_id = get_option('page_on_front');
get_template_part('template-parts/blogs-cards','',array('paged_id' => $page_id,'pageType'=>'blogs'));
get_footer();?>