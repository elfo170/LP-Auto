<?php
/**
 * The main template file
 */

get_header();
?>

<main>
    <?php
    if (is_front_page()) {
        get_template_part('template-parts/content', 'home');
    } else {
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            the_posts_navigation();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
    }
    ?>
</main>

<?php
get_footer();
