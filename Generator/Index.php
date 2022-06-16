<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-language" content="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="website, Marksheet, result, certificate, exams, create, Generator, maker, how to, Portal">
    <meta name="author" content="Nahez Sakharkar">
    <meta name="publisher" content="Nahez Sakharkar">
    <meta name="copyright" content="Nahez Sakharkar">
    <meta name="description" content="Result Portal for Student Marsheets">
    <meta name="page-topic" content="Examinations">
    <meta name="page-type" content="Portal">
    <meta name="audience" content="Everyone, Students, Teachers, Schools, Colleges">
    <meta name="robots" content="index, follow">
    <title>Marksheet Generator</title>
    <link rel="icon" type="image/png" href="images/titleimage.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="CSS/Style.css" />
    <script type="text/javascript" src="Javascript/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="blur">
        <div class="logoAnimate">
            <img src="images/generator.png"></img>
        </div>

        <div class="container" id="container">
            <div class="logInForm" id="logInForm">
                <form action="php/login.php" method="POST" id="logInPage" class="logInPage" name="logInPage" onsubmit="return formValidate();">                    
                    <input type="email" id="emailLogin" name="emailLogin" class="text" placeholder="&#xf21b; Enter Your Email"> <br>
                    <input type="password" id="passLogin" name="passLogin" class="text" placeholder="&#xf084; Password"><br><br>
                    <div id="errorLogin">
                        <span>Incorrect Email or Password</span>
                    </div>
                    <button type="button" name="submitBtnLogin" id="loginButton" class="loginButton" onclick="verify();">Log In</button>
                </form>
                <p><a href="#" onclick="forgotClicked()">forgotten password?</a><br></p>
                <br>
                <hr>
                <div class="btn">
                    <button class="signUpButton" onclick="toggle();">Create New Account</button>
                </div>
            </div>
            <div class="forgot-password" id="forgot-password">
                <form style="background: transparent;" action="php/checkForgotEmail.php" method="POST" id="forgotForm" name="forgotForm" onsubmit="return checkForgotEmail();">
                    <label for="emailLogin-forgot">Enter Your Email</label>
                    <input type="email" id="emailLogin-forgot" name="emailLogin-forgot" class="text" placeholder="Email">
                    <div style="background: transparent; padding-bottom: 1rem;">
                        <span id="errorLogin-forgot-password"></span>
                    </div>
                    <button type="button" id="Reset-My-Password" class="Reset-My-Password" onclick="checkForgotEmailEmpty();">Reset My Password</button><br>
                </form>
                <span id="closeModal-fp" class="Close">&times;</span>
            </div>
            <div class="security-password" id="security-password">
                <form style="background: transparent;" action="php/answerRetrive.php" method="POST" id="securityForm" name="securityForm" onsubmit="return checkPasswordFunc();">
                    <span id="security-question-span"></span>
                    <input style="margin-bottom: 1rem;" type="text" id="answer-forgot" name="answer-forgot" class="text" placeholder="Answer This Question">
                    <div style="background: transparent;">
                        <span id="security-error-question"></span>
                    </div>
                    <button type="submit" id="security-My-Password" class="Reset-My-Password">Reset My Password</button><br>
                </form>
                <span id="closeModal-fp-security" class="Close" onclick="<?php include "php/destroySession.php"; ?>">&times;</span>
            </div>
            <div class="reset-password" id="reset-password">
                <form style="background: transparent;" action="php/resetPassword.php" method="POST" id="resetForm" name="resetForm" onsubmit="return ResetPassSend();">
                    <input type="password" id="resetnewpass-forgot" name="resetnewpass-forgot" class="text" placeholder="Enter New Password">
                    <input style="margin-bottom: 1rem;" type="password" id="resetconfirmpass-forgot" name="resetconfirmpass-forgot" class="text" placeholder="Confirm Password">
                    <div style="background: transparent;">
                        <span id="error-forgot-password"></span>
                    </div>
                    <button type="button" id="Reset-My-Password-Real" class="Reset-My-Password" onclick="validateResetPassword();">Reset My Password</button><br>
                </form>
                <span id="closeModal-fp-reset" class="Close" onclick="<?php include "php/destroySession.php"; ?>">&times;</span>
            </div>
        </div>
    </div>
    <div id="success-updatePass">
      <div id="success-UP">
        <div>
          <span>Your Password Was Successfully Updated</span>
        </div>
        <div>
          <button onclick="successPass();">OK</button>
        </div>
      </div>
    </div>
    <div id="signUp" class="signUpModal">
        <span id="closeModal" class="Close">&times;</span>
        <h1 style="font-family: Century Gothic; background-color: white;">Sign Up</h2>
            <h4 style="font-family: Century Gothic; font-weight: 100; background-color: white; padding-bottom: 10px;">Just few of Your Details.</h2>
                <hr>
                <form action="php/signup.php" method="POST" id="signUpForm" class="signUpForm" name="signUpForm" onsubmit="return formSubmit();">
                    <table style="background-color: white; text-align: center; border-spacing: 10px;">
                        <tr>
                            <td style="background-color: white; padding-right: 5%;">
                                <input type="text" id="fName" name="fName" class="text" placeholder="First Name" required>
                            </td>
                            <td style="background-color: white; padding-left: 5%;">
                                <input type="text" id="surname" name="surname" class="text" placeholder="Surname" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: white;">
                                <input type="text" id="email" name="email" class="text" placeholder="Email" required>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: white;">
                                <input type="password" id="nPass" name="nPass" class="text" placeholder="New Password" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: white;">
                                <input type="password" id="cPass" name="cPass" class="text" placeholder="Confirm Password" required><br>
                            </td>
                        </tr>
                    </table>
                    <table class="errorMsg">
                        <tr>
                            <td id="namesurerror">
                                Name feild Empty.
                            </td>
                        </tr>
                        <tr>
                            <td id="emailerror">
                                Invalid Email.
                            </td>
                        </tr>
                        <tr>
                            <td id="passerror">
                                Password should be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.
                            </td>
                        </tr>
                        <tr>
                            <td id="passmatcherror">
                                Password Mismatched.
                            </td>
                        </tr>
                        <tr>
                            <td id="sameemailerror">
                                <!-- This Email is already in use. -->
                            </td>
                        </tr>
                    </table>
                    <br>
                    <h5 style="font-family: Century Gothic; font-weight: 100; background-color: white;">By clicking Sign Up, you agree to
                        our Terms, Data Policy and Cookie Policy. You may receive SMS notifications from us and can opt
                        out at any time.</h5><br>
                    <div id="signUpBtn">
                        <button type="submit" name="submitBtnSignup" id="send" class="send" onclick="hideAll();validate();">Sign Up</button>
                    </div>
                </form>
    </div>
    <script type="text/javascript" src="Javascript/js.js"></script>
    <script type="text/javascript" src="Javascript/emailsame.js"></script>
</body>

</html>