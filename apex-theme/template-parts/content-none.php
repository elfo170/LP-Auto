<?php
/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nada Encontrado', 'apex-theme'); ?></h1>
    </header><!-- .page-header -->

    <div class="page-content">
        <?php
        if (is_search()) :
            ?>

            <p><?php esc_html_e('Desculpe, mas nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'apex-theme'); ?></p>
            <?php
            get_search_form();

        else :
            ?>

            <p><?php esc_html_e('Parece que não conseguimos encontrar o que você está procurando. Talvez a pesquisa possa ajudar.', 'apex-theme'); ?></p>
            <?php
            get_search_form();

        endif;
        ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
