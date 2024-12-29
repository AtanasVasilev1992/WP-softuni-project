jQuery(document).ready(function($) {
    console.log('Form script loaded'); // Debug message
    
    $('#fruits-contact').on('submit', function(e) {
        console.log('Form submitted'); // Debug message
        e.preventDefault(); // Важно!
        
        const formData = new FormData(this);
        formData.append('action', 'handle_contact_form');
        
        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Response:', response); // Debug message
                if (response.success) {
                    $('#form_status').html('<p class="success">Message sent successfully!</p>');
                    $('#fruits-contact')[0].reset();
                } else {
                    $('#form_status').html('<p class="error">' + response.data + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error); // Debug message
                $('#form_status').html('<p class="error">Something went wrong. Please try again.</p>');
            }
        });
        
        return false; // Допълнително предотвратяване на submit
    });
});