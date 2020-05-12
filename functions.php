<?php
update_option( 'siteurl', 'http://localhost' );
update_option( 'home', 'http://localhost' );

// scripts and styles
function fbp_files(){
  
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/CSS/bootstrap.css', array(), false, 'all');
  wp_enqueue_style('fbp_main_styles', get_stylesheet_uri(), array(), false, 'all');
  wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );

  wp_deregister_script('jquery');
  wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(),'', true);
  wp_enqueue_script('popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array(),'',true);
  wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array(),'', true);
  wp_enqueue_script('custom_sidebar', get_template_directory_uri() . '/js/side-bar.js', array(),'',true);
  wp_enqueue_script('custom_slider', get_template_directory_uri() . '/js/custom-slideshow.js', array('jquery'),'',true);
  wp_enqueue_script('scrollto', get_template_directory_uri().'/js/jquery.scrollTo.min.js', array('jquery'),'',true);
  if (is_page('prints')):
    //wp_enqueue_style('zoomple', get_stylesheet_directory_uri().'/CSS/zoomple.css', array(), false, 'all');
    //wp_enqueue_script('zoomple', get_template_directory_uri().'/js/zoomple.js', array('jquery'), '', true);
    wp_enqueue_script('elevatezoom', 'https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js', array(),'',true);
    //wp_enqueue_script('snipe', get_template_directory_uri().'/js/jquery.snipe.min.js', array('jquery'),'',true);
    wp_enqueue_script('magnify-custom', get_template_directory_uri().'/js/magnifier-shop.js', array(),'',true);
  endif;
  if(is_page('about')):
    wp_deregister_script('custom_slider');
  endif;
};
add_action('wp_enqueue_scripts','fbp_files');

// custom functions

//fbp setup
function fbp_setup(){

  //Nav Menu
  register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu')
  ));
  //widget sidebar
  register_sidebar(array(
    'name'=>'widget sidebar',
    'id'=>'widget_sidebar',
    'before_widget'=>'<div>',
    'after_widget'=>'</div>',
    'before_title'=>'<h2>',
    'after_title'=>'</h2>'
  ));
  register_sidebar(array(
    'name'=>'sidebar about',
    'id'=>'sidebar_about',
    'before_widget'=>'<div>',
    'after_widget'=>'</div>',
    'before_title'=>'<h2>',
    'after_title'=>'</h2>'
  ));
          // Theme Supports

  // Add featured image support
    add_theme_support('post-thumbnails');
  // Add logo support
    add_theme_support('custom-logo');
}
add_action('after_setup_theme','fbp_setup');

//slideshow pages
function slideshow_pages(){
  $currentpage=get_the_ID();
  $my_query = new WP_Query();
  $all_pages = $my_query->query(array('post_type'=>'page','posts_per_page' => '-1'));
  $children= get_page_children($currentpage, $all_pages);
 
  foreach ($children as $post){
    $thumbnailid=get_post_thumbnail_id($post);
    $postthumbnail= wp_get_attachment_image_src($thumbnailid,'full-size');
      setup_postdata($post); ?>
      <div class = mySlides>
          <a class="scroll-down"></a>

<?php if (is_page('prints')):?>  
          <img class = "slide-print" src="<?php echo $postthumbnail[0];?>">
          <h3 class="title mt-3"><?php echo ($post->post_title);?></h3>
          <div class="mr-5 ml-5 mb-5 mt-1 text-justify"><?php the_content($post);?></div> 
<?php elseif (is_page('stories')):?>
              <div class="mask-stories"></div>
              <img class = "slide" src="<?php echo $postthumbnail[0];?>">
              <h3 class="title mt-3"></h3>
              <div class="stories mr-5 ml-5 mb-5 mt-1 text-justify"><?php the_content($post);?></div>
<?php else: ?>
          <img class = "slide" src="<?php echo $postthumbnail[0];?>">
          <h3 class="title mt-3"><?php echo ($post->post_title);?></h3>
          <div class="mr-5 ml-5 mb-5 mt-1 text-justify"><?php the_content($post);?></div>
<?php  endif;?>
      </div> 
<?php 
  }
};
//thumbnails nav
function thumbnail_nav(){
  $my_wp_query = new WP_Query();// Set up the objects needed
  $all_wp_pages = $my_wp_query->query(array('post_type'=>'page','posts_per_page' => '-1'));
  $parent_page =  get_page($post->ID);
  $page_children = get_page_children( $parent_page->ID, $all_wp_pages );// Filter through all pages and find page's children
  $counter = 1;

foreach($page_children as $children):
  $children_thumbnail_ID= get_post_thumbnail_id($children);//Get Thumbnails ID from children pages
  $children_thumbnail_caption=wp_get_attachment_caption($children_thumbnail_ID);// get caption
  $children_thumbnail_image=wp_get_attachment_image_src($children_thumbnail_ID,'large'); // get thumbnails
  if(is_page('stories')||is_page('prints')){ ?>
    <img id="thumbNails" class="thumbs" src="<?php echo $children_thumbnail_image[0];?>"onclick="currentSlide(<?php echo $counter;?>)">
    <p class="stories-caption"><?php echo $children_thumbnail_caption;?></p>
    <?php
  }
else{ ?>
  <img id="thumbNails" class="thumbs" src="<?php echo $children_thumbnail_image[0];?>"onclick="currentSlide(<?php echo $counter;?>)">
  <?php }
$counter ++;
endforeach; 
};














