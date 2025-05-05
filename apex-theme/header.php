<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <header id="header" class="header">
        <div class="container">
            <div class="logo">
                <?php 
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Ativo1.svg" alt="<?php bloginfo('name'); ?>" class="logo-full">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Ativo2.svg" alt="<?php bloginfo('name'); ?>" class="logo-icon">
                <?php } ?>
            </div>
            <nav>
                <button class="menu-toggle" aria-label="Abrir menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav-links',
                    'fallback_cb'    => 'apex_default_menu',
                ));
                ?>
            </nav>
        </div>
    </header>
    
    <?php
    // Função de fallback para menu caso não esteja registrado
    function apex_default_menu() {
        echo '<ul class="nav-links">';
        echo '<li><a href="#section2">Automações com IA</a></li>';
        echo '<li><a href="#section8">Nossas Soluções</a></li>';
        echo '<li><a href="#section10">FAQ</a></li>';
        echo '<li class="cta-button"><a href="#section11" class="btn secondary-btn">Entre em contato agora!</a></li>';
        echo '</ul>';
    }
    ?>
