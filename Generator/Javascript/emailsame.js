$(document).ready(function () {
    $('#email').keyup(function (e) { 
        var emailSameValue = $('#email').val();
        $.ajax({
            type: "POST",
            url: "php/emailcheck.php",
            data: {
                "check_submit_btn" : 1,
                "email_id" : emailSameValue,
            },
            success: function (response) {
                $('#sameemailerror').text(response);
                var checkId = $('#sameemailerror').text();
                if(checkId == "This Email is already in use.") {
                    document.getElementById("send").type = "button";
                }
                else if(checkId == "") {
                    document.getElementById("send").type = "submit";
                }
            }
        });
    });
});