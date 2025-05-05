<?php
/**
 * The main template file for demonstration purpose only
 * 
 * Note: This file is used for demonstration only. It provides a simplified view of how
 * the theme would look in a WordPress installation. For actual WordPress functionality,
 * the full theme needs to be installed in a WordPress environment.
 */

// Simulating WordPress functions for demonstration
function get_header() {
    include('header.php');
}

function get_footer() {
    include('footer.php');
}

function get_template_part($slug, $name = null) {
    $file = 'template-parts/' . $slug . ($name ? '-' . $name : '') . '.php';
    if (file_exists($file)) {
        include($file);
    }
}

function is_front_page() {
    return true; // Always true for demo
}

function get_template_directory_uri() {
    return '.'; // Current directory
}

function bloginfo($show) {
    switch ($show) {
        case 'name':
            echo 'Apex Soluções Digitais';
            break;
        case 'description':
            echo 'Automações com IA';
            break;
        case 'charset':
            echo 'UTF-8';
            break;
        default:
            echo '';
    }
}

function wp_head() {
    echo '<!-- Simulated wp_head() -->';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">';
    echo '<link rel="stylesheet" href="./css/styles.css">';
    echo '<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">';
}

function wp_footer() {
    echo '<!-- Simulated wp_footer() -->';
    echo '<script src="./js/script.js"></script>';
}

function body_class() {
    echo 'home';
}

function wp_body_open() {
    echo '<!-- Simulated wp_body_open() -->';
}

function language_attributes() {
    echo 'lang="pt-BR"';
}

function wp_nav_menu($args) {
    echo '<ul class="nav-links">';
    echo '<li><a href="#section2">Automações com IA</a></li>';
    echo '<li><a href="#section8">Nossas Soluções</a></li>';
    echo '<li><a href="#section10">FAQ</a></li>';
    echo '<li class="cta-button"><a href="#section11" class="btn secondary-btn">Entre em contato agora!</a></li>';
    echo '</ul>';
}

function admin_url($path) {
    return '#';
}

function wp_nonce_field($action, $name) {
    echo '<input type="hidden" name="_wpnonce" value="demo_nonce" />';
    echo '<input type="hidden" name="_wp_http_referer" value="" />';
}

// Start demonstration
get_header();
?>

<main>
    <?php get_template_part('template-parts/content', 'home'); ?>
</main>

<?php
get_footer();
?>