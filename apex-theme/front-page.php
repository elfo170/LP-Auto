<?php
/**
 * The template for displaying the front page
 */

get_header();
?>

<main>
    <?php get_template_part('template-parts/content', 'home'); ?>
</main>

<?php
get_footer();
