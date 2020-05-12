<?php /* Template Name: Thank you */
/* this template is to be use for the thank you page and cancellation after a paypal checkout */

get_header('thanks'); 

if (have_posts()) :
    while (have_posts()): the_post();?>
    <div class="content-thanks">
        <div id="logo" class="mb-2"><?php the_custom_logo();?></div>
        <?php the_content();
        //Get the front page ID
        $frontpageid=get_option('page_on_front');
//PAGE THANK YOU
        if (is_page('thank-you')):?>
        <a id="return" href="<?php echo the_permalink($frontpageid)?>">
            Go Back to Home Page!
        </a>
<!-- PAGE CANCEL -->
        <?php elseif (is_page('cancel')):?>
        <a id="return" href="<?php echo the_permalink(11)?>">
            Go Back to Cart!
        </a>
        <?php endif;?>
    </div>  
    <?php
    endwhile;

    else :
        echo '<p>No content found </p>';
    endif;
?>

<?php get_footer();?>