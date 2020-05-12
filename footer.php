


            <?php if (is_page('thank-you') || is_page('cancel')): ?>
                    <div class="footer-thanks p-0 m-0">
                        <?php wp_nav_menu(array(
                            'container_class' => 'footer-menu',
                            'theme-location' => 'footer'
                            )
                        );?>
                        <p>©Florent Barth 2019</p>
                    </div>
        </div> <!-- close site wrap --> 
                    <?php wp_footer(); 
                else:
                    wp_footer();

                endif; ?>
    </body>
</html>