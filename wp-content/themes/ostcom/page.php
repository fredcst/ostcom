<?php get_header(); ?> 

<div class="container mx-auto p-4">
    <main>
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
        else :
            echo '<p>' . esc_html__('No content found.', 'ostcom') . '</p>';
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
