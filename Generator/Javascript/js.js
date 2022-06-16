//login----------------------------------------------------------------------------

$("#passLogin").keypress(function (event) {
    if (event.keyCode === 13) {
        $("#loginButton").click();
    }
});

function formValidate() {
    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: $('#logInPage').serialize(),
        success: function (response) {
            var checkId = response;
            if (checkId == "Success") {
                document.getElementById("errorLogin").style.display = "none";
                window.open('Dashboard/Dashboard.php', '_self');
            }
            else if (checkId == "Failed") {
                document.getElementById("errorLogin").style.display = "block";
            }
        }
    });
    $('#logInPage').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function verify() {
    const emailLogin = $('#emailLogin').val();
    const passLogin = $('#passLogin').val();
    if ((emailLogin == '') && (passLogin == '')) {
        document.getElementById("errorLogin").style.display = "block";
    }
    else if (passLogin == '') {
        document.getElementById("errorLogin").style.display = "block";
    }
    else if (emailLogin == '') {
        document.getElementById("errorLogin").style.display = "block";
    }
    else {
        document.getElementById("loginButton").type = "submit";
    }
}
//resetpass=============================================================================

//success---------

function successPass() {
    var blur = document.getElementById("blur");
    blur.classList.toggle('active');
    var success = document.getElementById('success-updatePass');
    success.classList.toggle('active');
}

//----------------

var container = document.getElementById("container").style;
var logInForm = document.getElementById("logInForm").style;
var forgot_password = document.getElementById("forgot-password").style;
var reset_password = document.getElementById("reset-password").style;
var security_password = document.getElementById("security-password").style;
var forgotEmail = document.getElementById("emailLogin-forgot");
var forgotError = document.getElementById("errorLogin-forgot-password");

function ResetPassSend() {
    $.ajax({
        type: "POST",
        url: "php/resetPassword.php",
        data: $("#resetForm").serialize(),
        success: function (response) {
            document.getElementById("Reset-My-Password-Real").type = "button";
            document.getElementById("resetForm").reset();
            document.getElementById("securityForm").reset();
            document.getElementById("forgotForm").reset();
            document.getElementById("reset-password").style.height = "250px";
            reset_password.display = "none";
            forgot_password.display = "none";
            security_password.display = "none";
            logInForm.display = "inherit";
            container.marginTop = "-450px";
            container.transition = "0.5s";
            successPass();
        }
    });
    $('#resetForm').submit(function (e) {
        e.preventDefault();
    });
    return false;

}

function validateResetPassword() {
    var newPassReset = document.getElementById("resetnewpass-forgot").value;
    var confirmPassReset = document.getElementById("resetconfirmpass-forgot").value;
    var passwordValidCheck = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if (newPassReset == "" && confirmPassReset == "") {
        document.getElementById("error-forgot-password").innerHTML = "Your Password Cannot Be Empty";
        document.getElementById("Reset-My-Password-Real").style.marginTop = "1rem"; 
    }
    else if (newPassReset != "" && confirmPassReset == "") {
        if (newPassReset.match(passwordValidCheck)) {
            document.getElementById("error-forgot-password").innerHTML = "Password Mismatched";
            document.getElementById("Reset-My-Password-Real").style.marginTop = "1rem"; 
        }
        else {
            document.getElementById("error-forgot-password").innerHTML = "Password should be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.";
            document.getElementById("reset-password").style.height = "280px";
            document.getElementById("reset-password").style.marginTop = "-37px";
            document.getElementById("Reset-My-Password-Real").style.marginTop = "1rem"; 
        }
    }
    else {
        if (newPassReset.match(passwordValidCheck)) {
            if (newPassReset == confirmPassReset) {
                document.getElementById("Reset-My-Password-Real").type = "submit";
                document.getElementById("error-forgot-password").innerHTML = "";
            }
            else {
                document.getElementById("error-forgot-password").innerHTML = "Password Mismatched";
                document.getElementById("Reset-My-Password-Real").style.marginTop = "1rem"; 
            }
        }
    }
}

function forgotresetClickedAgain() {
    logInForm.display = "none";
    forgot_password.display = "none";
    security_password.display = "none";
    reset_password.display = "flex";
    container.marginTop = "-370px";
    container.transition = "0.5s";
}

// Close the reset modal
var btnCloseReset = document.getElementById("closeModal-fp-reset");
btnCloseReset.onclick = function () {
    document.getElementById("resetForm").reset();
    document.getElementById("securityForm").reset();
    document.getElementById("forgotForm").reset();
    document.getElementById("error-forgot-password").innerHTML = "";
    document.getElementById("reset-password").style.height = "250px";
    reset_password.display = "none";
    forgot_password.display = "none";
    security_password.display = "none";
    logInForm.display = "inherit";
    container.marginTop = "-450px";
    container.transition = "0.5s";
}

//security=======================================================================

function checkPasswordFunc() {
    $.ajax({
        type: "POST",
        url: "php/answerRetrive.php",
        data: $('#securityForm').serialize(),
        success: function (response) {
            if (response == "incorrect") {
                document.getElementById("answer-forgot").style.marginBottom = "0rem"
                document.getElementById("security-error-question").innerHTML = "This Answer Is Incorrect";
            }
            else if (response == "correct") {
                forgotresetClickedAgain();
            }
        }
    });
    $('#securityForm').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function forgotresetClicked() {
    logInForm.display = "none";
    forgot_password.display = "none";
    reset_password.display = "none";
    security_password.display = "flex";
    container.marginTop = "-370px";
    container.transition = "0.5s";
}

// Close the security modal
var btnCloseSecurity = document.getElementById("closeModal-fp-security");
btnCloseSecurity.onclick = function () {
    document.getElementById("securityForm").reset();
    document.getElementById("forgotForm").reset();
    security_password.display = "none";
    logInForm.display = "inherit";
    container.marginTop = "-450px";
    container.transition = "0.5s";
}

//forgot===========================================================================

function checkForgotEmail() {
    document.getElementById("Reset-My-Password").type = "button";
    $.ajax({
        type: "POST",
        url: "php/checkForgotEmail.php",
        data: $('#forgotForm').serialize(),
        success: function (response) {
            if (response == "Not Registered") {
                forgotError.innerHTML = "This Email is Not Registered On Our Website";
            }
            else if (response == "insecure") {
                forgotError.innerHTML = "You Have Not Setup Your Security Question Yet";
            }
            else {
                document.getElementById("security-question-span").innerHTML = response;
                forgotresetClicked();
            }
        }
    });
    $('#forgotForm').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function checkForgotEmailEmpty() {
    if (forgotEmail.value == "") {
        forgotError.innerHTML = "Please Enter with the Email You have Registered with Us";
    }
    else {
        document.getElementById("Reset-My-Password").type = "submit";
    }
}

function forgotClicked() {
    logInForm.display = "none";
    forgotError.innerHTML = "";
    container.marginTop = "-370px";
    container.transition = "0.5s";
    forgot_password.display = "flex";
}

// Close the Forgot modal
var btnClose = document.getElementById("closeModal-fp");
btnClose.onclick = function () {
    document.getElementById("forgotForm").reset();
    forgot_password.display = "none";
    logInForm.display = "inherit";
    container.marginTop = "-450px";
    container.transition = "0.5s";
}

//signup start--------------------------------------------------------------------------

var errorNameSur = document.getElementById("namesurerror");
var errorEmail = document.getElementById("emailerror");
var errorPass = document.getElementById("passerror");
var errorPassMatch = document.getElementById("passmatcherror");

function visibleName() {
    document.getElementById("fName").style.border = "2px solid red";
    document.getElementById("surname").style.border = "2px solid red";
    errorNameSur.style.position = "relative";
    errorNameSur.style.visibility = "visible";
    errorNameSur.style.opacity = "1";
}
function visibleEmail() {
    document.getElementById("email").style.border = "2px solid red";
    errorEmail.style.position = "relative";
    errorEmail.style.visibility = "visible";
    errorEmail.style.opacity = "1";
}
function visiblePass() {
    document.getElementById("nPass").style.border = "2px solid red";
    errorPass.style.position = "relative";
    errorPass.style.visibility = "visible";
    errorPass.style.opacity = "1";
}
function visibleConPass() {
    document.getElementById("cPass").style.border = "2px solid red";
    errorPassMatch.style.position = "relative";
    errorPassMatch.style.visibility = "visible";
    errorPassMatch.style.opacity = "1";
}

function hideAll() {
    document.getElementById("fName").style.border = "1px solid #a0a9ae";
    document.getElementById("surname").style.border = "1px solid #a0a9ae";
    errorNameSur.style.position = "absolute";
    errorNameSur.style.visibility = "hidden";
    errorNameSur.style.opacity = "0";
    document.getElementById("fName").addEventListener("focus", function () {
        this.style = "border : 2px solid #243743";
    });
    document.getElementById("fName").addEventListener("blur", function () {
        this.style = "border : 1px solid #a0a9ae";
    });
    document.getElementById("surname").addEventListener("focus", function () {
        this.style = "border : 2px solid #243743";
    });
    document.getElementById("surname").addEventListener("blur", function () {
        this.style = "border : 1px solid #a0a9ae";
    });

    document.getElementById("email").style.border = "1px solid #a0a9ae";
    errorEmail.style.position = "absolute";
    errorEmail.style.visibility = "hidden";
    errorEmail.style.opacity = "0";
    document.getElementById("email").addEventListener("focus", function () {
        this.style = "border : 2px solid #243743";
    });
    document.getElementById("email").addEventListener("blur", function () {
        this.style = "border : 1px solid #a0a9ae";
    });

    document.getElementById("nPass").style.border = "1px solid #a0a9ae";
    errorPass.style.position = "absolute";
    errorPass.style.visibility = "hidden";
    errorPass.style.opacity = "0";
    document.getElementById("nPass").addEventListener("focus", function () {
        this.style = "border : 2px solid #243743";
    });
    document.getElementById("nPass").addEventListener("blur", function () {
        this.style = "border : 1px solid #a0a9ae";
    });

    document.getElementById("cPass").style.border = "1px solid #a0a9ae";
    errorPassMatch.style.position = "absolute";
    errorPassMatch.style.visibility = "hidden";
    errorPassMatch.style.opacity = "0";
    document.getElementById("cPass").addEventListener("focus", function () {
        this.style = "border : 2px solid #243743";
    });
    document.getElementById("cPass").addEventListener("blur", function () {
        this.style = "border : 1px solid #a0a9ae";
    });
}

function formSubmit() {
    $.ajax({
        type: 'POST',
        url: 'php/signup.php',
        data: $('#signUpForm').serialize(),
        success: function () {
            window.open("Dashboard/Dashboard.php", "_self");
        }
    });
    return false;
}

function validate() {
    var nameText = document.forms["signUpForm"]["fName"].value;
    var surnameText = document.forms["signUpForm"]["surname"].value;
    var emailText = document.forms["signUpForm"]["email"].value;
    var npassText = document.forms["signUpForm"]["nPass"].value;
    var cpassText = document.forms["signUpForm"]["cPass"].value;
    const emailValidCheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var passwordValidCheck = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    //all feilds empty
    if ((nameText == "") && (emailText == "") && (npassText == "")) {
        visibleName();
        visibleEmail();
        visiblePass();
    }

    //only name feild
    else if ((nameText != "") && (emailText == "") && (npassText == "")) {
        visibleEmail();
        visiblePass();
    }

    //only email field
    else if ((nameText == "") && (emailText != "") && (npassText == "")) {
        if (emailText.match(emailValidCheck)) {
            visibleName();
            visiblePass();
        }
        else {
            visibleName();
            visibleEmail();
            visiblePass();
        }
    }

    //only password feild
    else if ((nameText == "") && (emailText == "") && (npassText != "")) {
        if (npassText.match(passwordValidCheck)) {
            visibleName();
            visibleEmail();
        }
        visibleName();
        visibleEmail();
        visiblePass();
    }

    //both name and email
    else if ((nameText != "") && (emailText != "") && (npassText == "")) {
        if (emailText.match(emailValidCheck)) {
            visiblePass();
        }
        else {
            visibleEmail();
            visiblePass();
        }
    }

    //both name and password
    else if ((nameText != "") && (emailText == "") && (npassText != "")) {
        if (npassText.match(passwordValidCheck)) {
            visibleEmail();
        }
        visibleEmail();
        visiblePass();
    }

    //both email and password
    else if ((nameText == "") && (emailText != "") && (npassText != "")) {
        if ((emailText.match(emailValidCheck)) && (npassText.match(passwordValidCheck))) {
            visibleName();
        }
        else if ((emailText.match(emailValidCheck)) && (npassText.match(passwordValidCheck) == false)) {
            visibleName();
            visiblePass();
        }
        else if ((emailText.match(emailValidCheck) == false) && (npassText.match(passwordValidCheck))) {
            visibleName();
            visibleEmail();
        }
        else {
            visibleName();
            visibleEmail();
            visiblePass();
        }
    }

    //name email and password but not confirmed
    else if ((nameText != "") && (emailText != "") && (npassText != "") && (cpassText != npassText) || (cpassText == "")) {
        if ((emailText.match(emailValidCheck)) && (npassText.match(passwordValidCheck))) {
            visibleConPass();
        }
        else if ((emailText.match(emailValidCheck)) && (npassText.match(passwordValidCheck) == false)) {
            visiblePass();
        }
        else if ((emailText.match(emailValidCheck) == false) && (npassText.match(passwordValidCheck))) {
            visibleEmail();
            visibleConPass();
        }
        else {
            visiblePass();
        }
    }

    else {
        // document.getElementById("send").type = "submit";
    }
}

function toggle() {
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('signUp');
    popup.classList.toggle('active');
}

// Close the SignUp modal
var btnClose = document.getElementById("closeModal");
btnClose.onclick = function () {
    document.getElementById("signUpForm").reset();
    hideAll();
    toggle();
}

//signup end--------------------------------------------------------------