<?php
/**
 * Form Handler Functions for Apex Theme
 */

/**
 * Process contact form submission and redirect to WhatsApp
 */
function apex_process_contact_form() {
    // Verify nonce first
    if (!isset($_POST['apex_contact_nonce']) || !wp_verify_nonce($_POST['apex_contact_nonce'], 'apex_contact_form')) {
        wp_die('Verificação de segurança falhou. Por favor, tente novamente.');
    }

    // Validate form fields
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $niche = isset($_POST['niche']) ? sanitize_text_field($_POST['niche']) : '';
    $revenue = isset($_POST['revenue']) ? sanitize_text_field($_POST['revenue']) : '';

    // Perform validation
    if (empty($name) || empty($phone) || empty($company) || empty($niche) || empty($revenue)) {
        wp_die('Todos os campos são obrigatórios. Por favor, preencha o formulário corretamente.');
    }

    // Format WhatsApp message
    $whatsapp_message = "Olá! Vim do site e gostaria de entender como automações com IA podem ajudar o meu negócio.";
    $whatsapp_number = '5531995306257';
    $whatsapp_url = 'http://wa.me/' . $whatsapp_number . '?text=' . urlencode($whatsapp_message);

    // Optional: Save form data to database or send an email notification
    // You can add custom code here to save the form submission to a database table
    // or send an email notification to the admin

    // Store submission in WordPress database if desired
    $submission_data = array(
        'name' => $name,
        'phone' => $phone,
        'company' => $company,
        'niche' => $niche,
        'revenue' => $revenue,
        'submission_date' => current_time('mysql')
    );
    
    // This will trigger the 'apex_form_submission' action hook which you can use to handle the data
    do_action('apex_form_submission', $submission_data);

    // Redirect to WhatsApp
    wp_redirect($whatsapp_url);
    exit;
}
Add_action('admin_post_apex_contact_form_submission', 'apex_process_contact_form');
add_action('admin_post_nopriv_apex_contact_form_submission', 'apex_process_contact_form');

/**
 * Save form submission to database
 * Note: This requires creating a custom database table
 */
function apex_save_form_submission($submission_data) {
    // Example function to save data to a custom table
    // In a real implementation, you would create this table during theme activation
    global $wpdb;
    $table_name = $wpdb->prefix . 'apex_form_submissions';
    
    // Insert the data
    $wpdb->insert(
        $table_name,
        $submission_data,
        array('%s', '%s', '%s', '%s', '%s', '%s')
    );
}
// Uncomment this line after creating the database table
// add_action('apex_form_submission', 'apex_save_form_submission');

/**
 * Send email notification for new submissions
 */
function apex_email_notification($submission_data) {
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');
    
    $subject = "Nova submissão de formulário no site {$site_name}";
    
    $message = "Nova submissão de formulário recebida:\n\n";
    $message .= "Nome: {$submission_data['name']}\n";
    $message .= "Telefone: {$submission_data['phone']}\n";
    $message .= "Empresa: {$submission_data['company']}\n";
    $message .= "Nicho: {$submission_data['niche']}\n";
    $message .= "Faturamento: {$submission_data['revenue']}\n";
    $message .= "Data: {$submission_data['submission_date']}\n";
    
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    wp_mail($admin_email, $subject, $message, $headers);
}
add_action('apex_form_submission', 'apex_email_notification');
