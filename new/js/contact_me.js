// Contact Form Scripts




$(function() {

    $("#contactForm input").jqBootstrapValidation({
        preventSubmit: true,
        
        submitSuccess: function($form, event) {
            event.preventDefault(); 
            
            var title = $("input#title").val();
            var auteur = $("input#auteur").val();
            var contenu = $("input#contenu").val();
            var image = $("input#image").val();
           
        
            var $form = $("form");
            var formdata = new FormData($form[0]);
            var data = formdata;
        

            
            $.ajax({
                url: "../admin/contact-2.php",
                type: "POST",
                dataType : 'json', 
                contentType: false, 
                processData: false,
                data: data,
                cache: false,
                success: function(data) {
                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Article bien posté !</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function(data) {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + auteur+ ", le serveur ne répond pas. Essayer plus tard!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});



