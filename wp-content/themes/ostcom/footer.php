        <div class="mx-auto p-4 flex justify-between items-center bg-gray-800 text-white">
            <div class="container">
                <nav class="space-x-4 text-black flex">
                    <?php
                    echo wp_nav_menu([
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'flex space-x-4 text-black',
                        'depth' => 1,
                        'echo' => false,
                    ]);
                    ?>
                </nav>
                <div class="border border-black py-3"></div>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="no-underline text-white text-sm bg-red-700 text-white px-3 py-1.5 rounded-sm shadow-md hover:bg-red-800 transition cursor-pointer uppercase">Free estimate</a>
                </div>
            </div>
        </div>

        <?php wp_footer(); ?>
        
    </body>
</html>