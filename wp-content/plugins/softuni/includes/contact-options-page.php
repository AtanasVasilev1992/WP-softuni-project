<?php
/**
 * Contact Form Options Page
 */

// Hook to initialize the settings
add_action( 'admin_init', 'softuni_contact_form_settings_init' );

/**
 * Initializes settings and registers them with the Settings API.
 */
function softuni_contact_form_settings_init() {
    // Register the setting to store contact form options in the database
    register_setting( 'softuni_contact_form_options_group', 'softuni_contact_form_options' );

    // Add a settings section for contact form
    add_settings_section(
        'contact_form_main_section',                     // Section ID
        __( 'Contact Form Settings', 'softuni' ),        // Section title
        'softuni_contact_form_section_callback',         // Callback function for the section
        'softuni_contact_form_options'                   // Page to display the section
    );

    // Add a field for the contact form email
    add_settings_field(
        'softuni_contact_form_email',                    // Field ID
        __( 'Contact Form Email', 'softuni' ),           // Label for the field
        'softuni_contact_form_email_callback',           // Callback function for rendering the field
        'softuni_contact_form_options',                  // Page where the field will be displayed
        'contact_form_main_section'                      // Section where the field belongs
    );

    // Add a checkbox field to enable/disable contact form
    add_settings_field(
        'softuni_contact_form_enable',                   // Field ID
        __( 'Enable Contact Form', 'softuni' ),          // Label for the checkbox
        'softuni_contact_form_enable_callback',          // Callback function for rendering the checkbox
        'softuni_contact_form_options',                  // Page where the checkbox will be displayed
        'contact_form_main_section'                      // Section where the checkbox belongs
    );
}

/**
 * Callback function for the main section description.
 */
function softuni_contact_form_section_callback() {
    echo '<p>' . __( 'Configure the settings for your contact form.', 'softuni' ) . '</p>';
}

/**
 * Callback function for rendering the email field.
 */
function softuni_contact_form_email_callback() {
    // Retrieve the existing value from the database
    $options = get_option( 'softuni_contact_form_options' );
    $email   = isset( $options[ 'contact_form_email' ] ) ? esc_attr( $options[ 'contact_form_email' ] ) : get_option( 'admin_email' );
    ?>
    <input type="email" name="softuni_contact_form_options[contact_form_email]" 
           value="<?php echo $email; ?>" 
           placeholder="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>" />
    <p class="description"><?php esc_html_e( 'Enter the email address where contact form submissions will be sent.', 'softuni' ); ?></p>
    <?php
}

/**
 * Callback function for rendering the enable/disable checkbox field.
 */
function softuni_contact_form_enable_callback() {
    // Retrieve the existing value from the database
    $options = get_option( 'softuni_contact_form_options' );
    $checked = isset( $options[ 'contact_form_enable' ] ) && $options[ 'contact_form_enable' ] ? 'checked' : '';
    ?>
    <input type="checkbox" name="softuni_contact_form_options[contact_form_enable]" 
           value="1" <?php echo $checked; ?> />
    <p class="description"><?php esc_html_e( 'Check to enable the contact form on your website.', 'softuni' ); ?></p>
    <?php
}

// Hook to add the options page to the admin menu
add_action( 'admin_menu', 'softuni_contact_form_add_options_page' );

/**
 * Adds the contact form options page to the admin menu.
 */
function softuni_contact_form_add_options_page() {
    add_options_page(
        __( 'Contact Form Options', 'softuni' ),         // Page title
        __( 'Contact Form', 'softuni' ),                 // Menu title
        'manage_options',                                // Capability required to access the page
        'softuni-contact-form-options',                  // Menu slug
        'softuni_contact_form_options_page_callback'     // Callback function to render the page
    );
}

/**
 * Renders the contact form options page content.
 */
function softuni_contact_form_options_page_callback() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Contact Form Settings', 'softuni' ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // Output nonce, action, and option page fields for the settings page
            settings_fields( 'softuni_contact_form_options_group' );

            // Output settings sections and fields
            do_settings_sections( 'softuni_contact_form_options' );

            // Output the save settings button
            submit_button( __( 'Save Contact Form Settings', 'softuni' ) );
            ?>
        </form>
    </div>
    <?php
}

/**
 * Helper function to get contact form settings
 */
function softuni_get_contact_form_settings() {
    $options = get_option( 'softuni_contact_form_options' );
    
    return [
        'email'  => isset( $options[ 'contact_form_email' ] ) ? $options[ 'contact_form_email' ] : get_option( 'admin_email' ),
        'enable' => isset( $options[ 'contact_form_enable' ] ) ? (bool) $options[ 'contact_form_enable' ] : true
    ];
}

// Add filter for Contact Form 7 submission
add_action('wpcf7_before_send_mail', 'custom_cf7_before_send_mail');

function custom_cf7_before_send_mail($contact_form) {
    $settings = softuni_get_contact_form_settings();
    
    if (!$settings['enable']) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $mail = $contact_form->prop('mail');
        $mail['recipient'] = $settings['email'];
        $contact_form->set_properties(['mail' => $mail]);
    }
}

// Add admin notice if Contact Form is disabled
add_action('admin_notices', 'contact_form_status_notice');

function contact_form_status_notice() {
    $settings = softuni_get_contact_form_settings();
    if (!$settings['enable']) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>Contact Form is currently disabled. Enable it in Settings -> Contact Form.</p>';
        echo '</div>';
    }
}