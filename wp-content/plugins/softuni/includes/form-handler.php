<?php
add_action('wp_ajax_handle_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form_submission');

function handle_contact_form_submission() {
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_submit')) {
        wp_send_json_error('Invalid security token');
    }

    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill all required fields');
    }

    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email');
    }

    $settings = softuni_get_contact_form_settings();
    if (!$settings['enable']) {
        wp_send_json_error('Contact form is currently disabled');
    }

    $to = $settings['email'];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    $email_content = sprintf(
        'Name: %s<br>
         Email: %s<br>
         Phone: %s<br>
         Subject: %s<br>
         Message: %s',
        $name,
        $email,
        $phone,
        $subject,
        $message
    );

    error_log('Form submission data: ' . print_r($_POST, true));
    
    if (defined('WP_DEBUG') && WP_DEBUG) {
        wp_send_json_success('Test message logged (local environment)');
        return;
    }

    $mail_sent = wp_mail($to, $subject, $email_content, $headers);

    if ($mail_sent) {
        wp_send_json_success('Message sent successfully');
    } else {
        wp_send_json_error('Failed to send message');
    }
}