// console.log("hi, the file loads");

jQuery(document).ready(function ($) {
    $(".like").on("click", function (e) {
        e.preventDefault();
        console.log("clicked"); // just to be sure

        let product_id = jQuery(this).attr("data-id"); // we'll need this later

        // console.log( product_id );
        
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: my_ajax_object.ajax_url,
            data: {
                action: "product_item_like",
                product_id: product_id,
            },
            success: function (msg) {
                console.log(msg);
            },
        });
    });
});
