jQuery(document).ready(function($) {
    $('#ajax-search-button').on('click', function(e) {
        e.preventDefault();
        
        var searchInput = $('#ajax-search-input');
        var searchQuery = searchInput.val().trim();
        var resultsContainer = $('.ajax-search-results');
        
        if (searchQuery.length < 2) {
            resultsContainer.html('<p>Please type 2 or more charecters.</p>');
            return;
        }
        
        $.ajax({
            url: ajaxsearch.ajax_url,
            type: 'POST',
            data: {
                action: 'ajax_search',
                search_query: searchQuery,
                nonce: ajaxsearch.nonce
            },
            beforeSend: function() {
                resultsContainer.html('<p>Searching...</p>');
            },
            success: function(response) {
                if (response.success) {
                    resultsContainer.html(response.data);
                } else {
                    console.error('Search failed:', response);
                    resultsContainer.html('<p>Search error. Please try again.</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
                resultsContainer.html('<p>Network error. Please try again.</p>');
            }
        });
    });

    $('.search-bar-icon').on('click', function(e) {
        e.preventDefault();
        $('.search-area').toggleClass('active');
    });
    
    $('.close-btn').on('click', function() {
        $('.search-area').removeClass('active');
    });

    $('#ajax-search-input').on('keypress', function(e) {
        if (e.which == 13) {
            $('#ajax-search-button').click();
        }
    });

    $('.close-btn').on('click', function() {
        $('.search-area').hide();
        $('.ajax-search-results').empty();
    });
});