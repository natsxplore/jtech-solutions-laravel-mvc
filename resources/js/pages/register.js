$(document).ready(function() {
    $('#registerForm, #loginForm').on('submit', function(e){
        e.preventDefault();

        let formData = new FormData(this);
        let url = $(this).data('url');

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status){
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr){
                window.handleApiError(xhr);
            }
        });
    });
});
