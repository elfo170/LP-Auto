<?php
/**
 * Template part for displaying the contact form
 */
?>
<form id="contactForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <?php wp_nonce_field('apex_contact_form', 'apex_contact_nonce'); ?>
    <input type="hidden" name="action" value="apex_contact_form_submission">
    
    <div class="form-group">
        <label for="name">Nome Completo*</label>
        <input type="text" id="name" name="name" required>
        <div id="nameError" class="error-message"></div>
    </div>
    
    <div class="form-group">
        <label for="phone">Telefone com DDD*</label>
        <input type="tel" id="phone" name="phone" required>
        <div id="phoneError" class="error-message"></div>
    </div>
    
    <div class="form-group">
        <label for="company">Nome da Empresa*</label>
        <input type="text" id="company" name="company" required>
        <div id="companyError" class="error-message"></div>
    </div>
    
    <div class="form-group">
        <label for="niche">Nicho da Empresa*</label>
        <input type="text" id="niche" name="niche" required>
        <div id="nicheError" class="error-message"></div>
    </div>
    
    <div class="form-group">
        <label for="revenue">Faturamento Mensal*</label>
        <select id="revenue" name="revenue" required>
            <option value="">Selecione uma opção</option>
            <option value="até R$10 mil">Até R$10 mil</option>
            <option value="R$10 mil a R$50 mil">R$10 mil a R$50 mil</option>
            <option value="R$50 mil a R$100 mil">R$50 mil a R$100 mil</option>
            <option value="R$100 mil a R$500 mil">R$100 mil a R$500 mil</option>
            <option value="Acima de R$500 mil">Acima de R$500 mil</option>
        </select>
        <div id="revenueError" class="error-message"></div>
    </div>
    
    <button type="submit" class="btn primary-btn">Enviar Formulário</button>
</form>