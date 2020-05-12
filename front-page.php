<?php get_header();

if (have_posts()) :
    while (have_posts()): the_post();?>
    
    <div class="slider">
        <a id="sidebarCollapse" class="hamburger" >
                <span id="hamburger"></span>
        </a>
        <?php slideshow_pages();?>
        <div class="slider-nav">
            <a><i id="back" class="backbtn fas fa-chevron-left pr-2" onclick="plusSlides(-1)"></i></a>
            <a><i id="next" class="nextbtn fas fa-chevron-right" onclick="plusSlides(1)"></i></a>
        </div>
        <a id="backTop"><i class="fa fa-chevron-up"></i></a>
    </div>
    <?php
    endwhile;

    else :
        echo '<p>No content found </p>';
    endif;
?>
</div> <!-- CLOSE CONTENT -->


        
</div>
<?php get_footer();?>