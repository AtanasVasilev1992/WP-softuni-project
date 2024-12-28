jQuery(document).ready(function($) {
    const contactForm = {
        init: function() {
            this.form = $('#fruits-contact');
            this.statusDiv = $('#form_status');
            this.bindEvents();
        },

        bindEvents: function() {
            this.form.on('submit', this.handleSubmit.bind(this));
        },

        handleSubmit: function(e) {
            e.preventDefault();
            
            const formData = new FormData(this.form[0]);
            formData.append('action', 'handle_contact_form');
            
            $.ajax({
                url: my_ajax_object.ajax_url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: this.handleSuccess.bind(this),
                error: this.handleError.bind(this)
            });
        },

        handleSuccess: function(response) {
            if (response.success) {
                this.statusDiv.html('<p class="success">Message sent successfully!</p>');
                this.form[0].reset();
            } else {
                this.statusDiv.html('<p class="error">' + response.data + '</p>');
            }
        },

        handleError: function() {
            this.statusDiv.html('<p class="error">Something went wrong. Please try again.</p>');
        }
    };

    contactForm.init();
});