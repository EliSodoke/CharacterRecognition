$(document).ready(function() {
    $("#login").submit(function() {
        //Retrieve input values
        var email = $("#email").val();
        var password = $("#password").val();

        if(email.trim() != "" && password.trim() != "") {
            //Submit form for final validation
            $.ajax({
                type: "POST",
                url: "/CharacterRecognition/Login/login",
                data: "email=" + email + "&password=" + password,
                success: function(html) {
                    if(html.trim() == "yes") {
                        window.location.href = "/CharacterRecognition/Dashboard/index";
                    } else {
                        $("#errMessage").html(html);
                    }
                }
            });
        }
        return false;
    });
});