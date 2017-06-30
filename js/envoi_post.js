// Contact Form Scripts
$(function() {

    $("#contactForm input").jqBootstrapValidation({
        preventSubmit: true,

        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var auteur = $("input#auteur").val();
            var titre = $("input#titre").val();
            var contenu = $("input#contenu").val();
            var image = $("input#image").val();
            var video = $("input#video").val();

            var $form = $("form");
            var formdata = new FormData($form[0]);
            var data = formdata;
            console.log($form);

            $.ajax({
                url: "../post/poster.php",
                type: "POST",
                contentType: false, // obligatoire pour de l'upload
                processData: false, // obligatoire pour de l'upload
                dataType: 'json',
                data: data,
                cache: false,
                success: function(data) {

                    // Success message
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Your message has been sent. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function(data/*XMLHttpRequest, textStatus, errorThrown*/) {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + auteur + ",  impossible de charger l'image. Essayez plus tard !");
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
