$(document).ready(function(){

    //Validation form rules
    function validateForms(form){
        $(form).validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                phone: "required",

                email: {
                    required: true,
                    email: true
                },
                checkbox:{
                    required: true,
                    
                },
                message: {
                    required: true,
                    minlength: 2
                },
            },
            messages: {
                name:{
                    required: "Pls enter your name",
                    minlength: jQuery.validator.format("Enter {0} more letters!")
                },
                message: {
                    required: "Pls enter your message",
                    minlength: jQuery.validator.format("Enter {0} more letters!")
                },
                phone: "Please enter your phone number",
                email: {
                required: "Please enter your mail",
                email: "Incorrectly entered the email address"
                },
                checkbox: {
                    required: "Pls mark the box"
                },
            }
        });
    };
    //Indicate all/some forms for validation 
    validateForms('#sender-form');

    //Applying mask for phone input (usin plugin)
    $('input[name=phone]').mask("+34 (999) 999-999");

    //Close modal window on click and go back to form 
    $('.modal__close').on('click', function() {
        $('.overlay, #thanks ').fadeOut('slow');
        $('#sender-form').fadeIn('slow');
    });

    //Sending configuration 
    $('form').submit(function(e) {
        e.preventDefault();

        if (!$(this).valid()) {
        return;   
        }
        $.ajax({
            type: "POST",
            url: "mailer/smart.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            $('#sender-form').fadeOut();
            $('.overlay, #thanks').fadeIn('slow');

            $('form').trigger('reset');
        });
        return false;
    });

});