<?php
/**
 * The template for displaying the footer
 */
?>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Ativo1.svg" alt="<?php bloginfo('name'); ?>">
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Apex Soluções Digitais — A próxima evolução do seu negócio começa aqui.</p>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top" aria-label="Voltar ao topo">
        <i class="fas fa-chevron-up"></i>
    </a>

<?php wp_footer(); ?>
</body>
</html>
