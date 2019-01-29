jQuery(document).ready(function($) {

    /* LOGIN FORM AJAX */
	/******************************************************************************************************************************************************/
    // Perform AJAX login on form submit
    $('form#loginform').on('submit', function(e){
        //$('form#loginform p.status').fadeIn().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#loginform #username').val(), 
                'password': $('form#loginform #password').val(), 
                'security': $('form#loginform #security').val() },
            success: function(data){
                $('form#loginform p.status').hide();
                if (data.loggedin == true){
                    document.location.href = window.location.href;
                } else {
                    $('form#loginform p.status').fadeIn().text(data.message);
                }
            }
        });
        e.preventDefault();
    });

    
});


 
