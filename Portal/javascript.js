function submit() {
    $.ajax({
        type: "POST",
        url: "checkResult.php",
        data: $('#formForm').serialize(),
        success: function (response) {
            if(response == "not-found") {
                document.getElementById("errorspan").innerHTML = "Result Not Found";
            }
            else {
                window.open("result/result.php");
            }
        }
    });
    $('#formForm').submit(function (e) {
        e.preventDefault();
    });
    return false;
}