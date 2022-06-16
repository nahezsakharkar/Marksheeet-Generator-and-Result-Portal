$(window).on('load', function () {
    document.getElementById('fullNameReflection').innerHTML = fullNameReflect;
    document.getElementById('professionReflection').innerHTML = professionReflect;
    document.getElementById('name-pf-update').value = nameReflect;
    document.getElementById('surname-pf-update').value = surnameReflect;
    document.getElementById('email-update').value = emailReflect;
    document.getElementById('DOB-update').value = dobReflect;
    document.getElementById('phone-update').value = phoneReflect;
    document.getElementById('pro-update').value = professionReflect;
    document.getElementById('institution-update').value = institutionReflect;
    document.getElementById('security-question-update').value = questionReflect;
    document.getElementById('security-answer-update').value = answerReflect;
    if (Number(noOfRows) > 0) {
        document.getElementById("no-marksheets").style.display = "none";
        document.getElementById("no-marksheets-yeah").style.display = "none";
    }
});

var dashboard = document.getElementById("dashboard");
var generate = document.getElementById("generate");
var post = document.getElementById("post");
var profile = document.getElementById("profile");

var dashView = document.getElementById("Dashboard-Selected").style;
var genView = document.getElementById("Generate-Selected").style;
var postView = document.getElementById("Post-Selected").style;
var proView = document.getElementById("Profile-Selected").style;

var noMarksheets = document.getElementById("no-marksheets").style;
var addMarksheets = document.getElementById("marksheets-add").style;
var detailsMarksheets = document.getElementById("details-marksheets").style;

var detailsMarksheetsInstitutionDiv = document.getElementById("details-marksheets-institution");
var detailsMarksheetsStudentDiv = document.getElementById("details-marksheets-student");
var detailsMarksheetsExamDiv = document.getElementById("details-marksheets-exam");
var detailsMarksheetsFooterDiv = document.getElementById("details-marksheets-footer");

var detailsMarksheetsInstitution = document.getElementById("details-marksheets-details-institution");
var detailsMarksheetsStudent = document.getElementById("details-marksheets-details-student");
var detailsMarksheetsExam = document.getElementById("details-marksheets-details-exam");
var detailsMarksheetsFooter = document.getElementById("details-marksheets-details-footer");

var arrowI = document.getElementById("institution-plus");
var arrowSt = document.getElementById("student-plus");
var arrowE = document.getElementById("exam-plus");
var arrowS = document.getElementById("footer-plus");

function dashboardPage() {
    document.getElementById("titleOption").innerHTML = "Dashboard";
    generate.className = "";
    post.className = "";
    profile.className = "";
    dashboard.className = "active";
    genView.display = "none";
    postView.display = "none";
    proView.display = "none";
    dashView.display = "block";
}
function generatePage() {
    document.getElementById("titleOption").innerHTML = "Generate Marksheet";
    dashboard.className = "";
    post.className = "";
    profile.className = "";
    generate.className = "active";
    dashView.display = "none";
    postView.display = "none";
    proView.display = "none";
    genView.display = "block";
}
function postPage() {
    document.getElementById("titleOption").innerHTML = "Post Results";
    dashboard.className = "";
    generate.className = "";
    profile.className = "";
    post.className = "active";
    dashView.display = "none";
    genView.display = "none";
    proView.display = "none";
    postView.display = "block";
}
function profilePage() {
    document.getElementById("titleOption").innerHTML = "Profile";
    dashboard.className = "";
    generate.className = "";
    post.className = "";
    profile.className = "active";
    dashView.display = "none";
    genView.display = "none";
    postView.display = "none";
    proView.display = "block";
}

function toggleLogout() {
    var disable = document.getElementById('disable');
    disable.classList.toggle('active');
    var popup = document.getElementById('confirm-logout');
    popup.classList.toggle('active');
}

//-------------------------------------------------------------------------------------------

function addMarksheet() {
    document.getElementById("title-for-generate").innerHTML = "Marksheet Details";
    addMarksheets.display = "none";
    detailsMarksheets.display = "block";
}

function plusInstitution() {
    if (arrowI.className == "las la-chevron-circle-down") {
        arrowI.className = "las la-chevron-circle-up";
        detailsMarksheetsInstitution.style.display = "flex";
    }
    else {
        arrowI.className = "las la-chevron-circle-down";
        detailsMarksheetsInstitution.style.display = "none";
    }
}

function plusStudent() {
    if (arrowSt.className == "las la-chevron-circle-down") {
        arrowSt.className = "las la-chevron-circle-up";
        detailsMarksheetsStudent.style.display = "flex";
    }
    else {
        arrowSt.className = "las la-chevron-circle-down";
        detailsMarksheetsStudent.style.display = "none";
    }
}

function plusExam() {
    if (arrowE.className == "las la-chevron-circle-down") {
        arrowE.className = "las la-chevron-circle-up";
        detailsMarksheetsExam.style.display = "flex";
    }
    else {
        arrowE.className = "las la-chevron-circle-down";
        detailsMarksheetsExam.style.display = "none";
    }
}

function plusSign() {
    if (arrowS.className == "las la-chevron-circle-down") {
        arrowS.className = "las la-chevron-circle-up";
        detailsMarksheetsFooter.style.display = "flex";
    }
    else {
        arrowS.className = "las la-chevron-circle-down";
        detailsMarksheetsFooter.style.display = "none";
    }
}

//appending subjects...

function spanSubjectCode(event) {
    value = document.getElementById("subject-code").value;
    $("#subject_code_marks").append('<span>' + value + '</span><br>');
};

function spanSubjectName(event) {
    value = document.getElementById("subject-name").value;
    $("#subject_name_marks").append('<span>' + value + '</span><br>');
};

function spanSubjectTheory(event) {
    value = document.getElementById("subject-theory").value;
    $("#subject_theory_marks").append('<span>' + value + '</span>');
};

function spanSubjectTheoryOutOf(event) {
    value = document.getElementById("subject-theory-outof").value;
    $("#subject_theory_marks").append('<span>/' + value + '</span><br>');
};

function spanSubjectPractical(event) {
    value = document.getElementById("subject-practical").value;
    $("#subject_practical_marks").append('<span>' + value + '</span>');
};

function spanSubjectPracticalOutOf(event) {
    value = document.getElementById("subject-practical-outof").value;
    $("#subject_practical_marks").append('<span>/' + value + '</span><br>');
};

function spanSubjectInternal(event) {
    value = document.getElementById("subject-internal").value;
    $("#subject_internal_marks").append('<span>' + value + '</span>');
};

function spanSubjectInternalOutOf(event) {
    value = document.getElementById("subject-internal-outof").value;
    $("#subject_internal_marks").append('<span>/' + value + '</span><br>');
};

// function for adding subjects
function addingSubject1() {
    document.getElementById('subject-add1').style.display = "none";
    document.getElementById('container-subject-add1').style.display = "flex";
}

function addingSubject2() {
    document.getElementById('subject-add2').style.display = "none";
    document.getElementById('container-subject-add2').style.display = "flex";
}

function addingSubject3() {
    document.getElementById('subject-add3').style.display = "none";
    document.getElementById('container-subject-add3').style.display = "flex";
}

function addingSubject4() {
    document.getElementById('subject-add4').style.display = "none";
    document.getElementById('container-subject-add4').style.display = "flex";
}

function addingSubject5() {
    document.getElementById('subject-add5').style.display = "none";
    document.getElementById('container-subject-add5').style.display = "flex";
}

function addingSubject6() {
    document.getElementById('subject-add6').style.display = "none";
    document.getElementById('container-subject-add6').style.display = "flex";
}

function addingSubject7() {
    document.getElementById('subject-add7').style.display = "none";
    document.getElementById('container-subject-add7').style.display = "flex";
}

//generate on submit

var institution_name = document.getElementById("institution-name");
var institution_location = document.getElementById("institution-location");
var institution_description = document.getElementById("institution-description");
var institution_logo = document.getElementById("institution-logo");

var student_name = document.getElementById("student-name");
var student_mother = document.getElementById("student-mother");
var student_num = document.getElementById("student-num");
var student_department = document.getElementById("student-department");
var student_class = document.getElementById("student-class");

var examination_merit = document.getElementById("examination-merit");
var examination_semester = document.getElementById("examination-semester");

//sub 1
var subject_name1 = document.getElementById("subject-name1");
var subject_code1 = document.getElementById("subject-code1");
var subject_theory1 = document.getElementById("subject-theory1");
var subject_theory_outof1 = document.getElementById("subject-theory-outof1");
var subject_practical1 = document.getElementById("subject-practical1");
var subject_practical_outof1 = document.getElementById("subject-practical-outof1");
var subject_internal1 = document.getElementById("subject-internal1");
var subject_internal_outof1 = document.getElementById("subject-internal-outof1");

//sub 2
var subject_name2 = document.getElementById("subject-name2");
var subject_code2 = document.getElementById("subject-code2");
var subject_theory2 = document.getElementById("subject-theory2");
var subject_theory_outof2 = document.getElementById("subject-theory-outof2");
var subject_practical2 = document.getElementById("subject-practical2");
var subject_practical_outof2 = document.getElementById("subject-practical-outof2");
var subject_internal2 = document.getElementById("subject-internal2");
var subject_internal_outof2 = document.getElementById("subject-internal-outof2");

//sub 3
var subject_name3 = document.getElementById("subject-name3");
var subject_code3 = document.getElementById("subject-code3");
var subject_theory3 = document.getElementById("subject-theory3");
var subject_theory_outof3 = document.getElementById("subject-theory-outof3");
var subject_practical3 = document.getElementById("subject-practical3");
var subject_practical_outof3 = document.getElementById("subject-practical-outof3");
var subject_internal3 = document.getElementById("subject-internal3");
var subject_internal_outof3 = document.getElementById("subject-internal-outof3");

//sub 4
var subject_name4 = document.getElementById("subject-name4");
var subject_code4 = document.getElementById("subject-code4");
var subject_theory4 = document.getElementById("subject-theory4");
var subject_theory_outof4 = document.getElementById("subject-theory-outof4");
var subject_practical4 = document.getElementById("subject-practical4");
var subject_practical_outof4 = document.getElementById("subject-practical-outof4");
var subject_internal4 = document.getElementById("subject-internal4");
var subject_internal_outof4 = document.getElementById("subject-internal-outof4");

//sub 5
var subject_name5 = document.getElementById("subject-name5");
var subject_code5 = document.getElementById("subject-code5");
var subject_theory5 = document.getElementById("subject-theory5");
var subject_theory_outof5 = document.getElementById("subject-theory-outof5");
var subject_practical5 = document.getElementById("subject-practical5");
var subject_practical_outof5 = document.getElementById("subject-practical-outof5");
var subject_internal5 = document.getElementById("subject-internal5");
var subject_internal_outof5 = document.getElementById("subject-internal-outof5");

//sub 6
var subject_name6 = document.getElementById("subject-name6");
var subject_code6 = document.getElementById("subject-code6");
var subject_theory6 = document.getElementById("subject-theory6");
var subject_theory_outof6 = document.getElementById("subject-theory-outof6");
var subject_practical6 = document.getElementById("subject-practical6");
var subject_practical_outof6 = document.getElementById("subject-practical-outof6");
var subject_internal6 = document.getElementById("subject-internal6");
var subject_internal_outof6 = document.getElementById("subject-internal-outof6");

//sub 7
var subject_name7 = document.getElementById("subject-name7");
var subject_code7 = document.getElementById("subject-code7");
var subject_theory7 = document.getElementById("subject-theory7");
var subject_theory_outof7 = document.getElementById("subject-theory-outof7");
var subject_practical7 = document.getElementById("subject-practical7");
var subject_practical_outof7 = document.getElementById("subject-practical-outof7");
var subject_internal7 = document.getElementById("subject-internal7");
var subject_internal_outof7 = document.getElementById("subject-internal-outof7");

var footer_teacher = document.getElementById("footer-teacher");
var footer_sign_teacher = document.getElementById("footer-sign-teacher");
var footer_hod = document.getElementById("footer-hod");
var footer_sign_hod = document.getElementById("footer-sign-hod");


function imglogo(event) {
    var imagebox = URL.createObjectURL(event.target.files[0]);
    document.getElementById("logotop").style.backgroundImage = "url('" + imagebox + "')";
    document.getElementById("logo_again_div").style.backgroundImage = "url('" + imagebox + "')";
};

function imgsign1(event) {
    var imagebox = URL.createObjectURL(event.target.files[0]);
    document.getElementById("teacher_sign_image_png").style.background = "url('" + imagebox + "')";
    document.getElementById("teacher_sign_image_png").style.backgroundRepeat = "no-repeat";
    document.getElementById("teacher_sign_image_png").style.backgroundSize = "100% 100%";
};

function imgsign2(event) {
    var imagebox = URL.createObjectURL(event.target.files[0]);
    document.getElementById("hod_sign_image_png").style.background = "url('" + imagebox + "')";
    document.getElementById("hod_sign_image_png").style.backgroundRepeat = "no-repeat";
    document.getElementById("hod_sign_image_png").style.backgroundSize = "100% 100%";
};

function getSucessPassFail() {
    var x = document.getElementById("subject_grade_marks");
    if (x.innerHTML.includes("F")) {
        document.getElementById("success_result_span").innerHTML = "Unsuccessful";
    }
    else {
        document.getElementById("success_result_span").innerHTML = "Successful";
    }
}

// $(document).ready(function () {
//     $("#GenerateForm").on("submit", function (e) {
//         e.preventDefault();
//         var fd = new FormData(this);
//         fd.append('institution-logo', $("#institution-logo")[0].files[0]);
//         fd.append('footer-sign-teacher', $("#footer-sign-teacher")[0].files[0]);
//         fd.append('footer-sign-hod', $("#footer-sign-hod")[0].files[0]);
//         console.log(fd);
//         $.ajax({
//             type: "POST",
//             url: "marksheetImage.php",
//             data: fd,
//             processData: false,
//             contentType: false,
//         });
//     });
// });


function MarksheetDetailsOnSubmit() {
    document.getElementById("institution_name_div_span").innerHTML = institution_name.value;
    document.getElementById("institution_location_div_span").innerHTML = institution_location.value;
    document.getElementById("institution_description_div_span").innerHTML = institution_description.value;

    document.getElementById("student_name_span").innerHTML = student_name.value;
    document.getElementById("student_mothername_span").innerHTML = student_mother.value;
    document.getElementById("student_roll_span").innerHTML = student_num.value;
    document.getElementById("department_name_span").innerHTML = student_department.value + " : ";
    document.getElementById("student_class_span").innerHTML = student_class.value;

    document.getElementById("student_merit_span").innerHTML = examination_merit.value;
    document.getElementById("semester_num_span").innerHTML = examination_semester.value;

    //subject codes
    document.getElementById("subject_code_marks1").innerHTML = subject_code1.value;
    document.getElementById("subject_code_marks2").innerHTML = subject_code2.value;
    document.getElementById("subject_code_marks3").innerHTML = subject_code3.value;
    document.getElementById("subject_code_marks4").innerHTML = subject_code4.value;
    document.getElementById("subject_code_marks5").innerHTML = subject_code5.value;
    document.getElementById("subject_code_marks6").innerHTML = subject_code6.value;
    document.getElementById("subject_code_marks7").innerHTML = subject_code7.value;

    //subject names
    document.getElementById("subject_name_marks1").innerHTML = subject_name1.value;
    document.getElementById("subject_name_marks2").innerHTML = subject_name2.value;
    document.getElementById("subject_name_marks3").innerHTML = subject_name3.value;
    document.getElementById("subject_name_marks4").innerHTML = subject_name4.value;
    document.getElementById("subject_name_marks5").innerHTML = subject_name5.value;
    document.getElementById("subject_name_marks6").innerHTML = subject_name6.value;
    document.getElementById("subject_name_marks7").innerHTML = subject_name7.value;

    //subject theory
    document.getElementById("subject_theory_marks1").innerHTML = subject_theory1.value + "/" + subject_theory_outof1.value;
    document.getElementById("subject_theory_marks2").innerHTML = subject_theory2.value + "/" + subject_theory_outof2.value;
    document.getElementById("subject_theory_marks3").innerHTML = subject_theory3.value + "/" + subject_theory_outof3.value;
    document.getElementById("subject_theory_marks4").innerHTML = subject_theory4.value + "/" + subject_theory_outof4.value;
    document.getElementById("subject_theory_marks5").innerHTML = subject_theory5.value + "/" + subject_theory_outof5.value;
    document.getElementById("subject_theory_marks6").innerHTML = subject_theory6.value + "/" + subject_theory_outof6.value;
    document.getElementById("subject_theory_marks7").innerHTML = subject_theory7.value + "/" + subject_theory_outof7.value;

    //subject practical
    document.getElementById("subject_practical_marks1").innerHTML = subject_practical1.value + "/" + subject_practical_outof1.value;
    document.getElementById("subject_practical_marks2").innerHTML = subject_practical2.value + "/" + subject_practical_outof2.value;
    document.getElementById("subject_practical_marks3").innerHTML = subject_practical3.value + "/" + subject_practical_outof3.value;
    document.getElementById("subject_practical_marks4").innerHTML = subject_practical4.value + "/" + subject_practical_outof4.value;
    document.getElementById("subject_practical_marks5").innerHTML = subject_practical5.value + "/" + subject_practical_outof5.value;
    document.getElementById("subject_practical_marks6").innerHTML = subject_practical6.value + "/" + subject_practical_outof6.value;
    document.getElementById("subject_practical_marks7").innerHTML = subject_practical7.value + "/" + subject_practical_outof7.value;

    //subject internal
    document.getElementById("subject_internal_marks1").innerHTML = subject_internal1.value + "/" + subject_internal_outof1.value;
    document.getElementById("subject_internal_marks2").innerHTML = subject_internal2.value + "/" + subject_internal_outof2.value;
    document.getElementById("subject_internal_marks3").innerHTML = subject_internal3.value + "/" + subject_internal_outof3.value;
    document.getElementById("subject_internal_marks4").innerHTML = subject_internal4.value + "/" + subject_internal_outof4.value;
    document.getElementById("subject_internal_marks5").innerHTML = subject_internal5.value + "/" + subject_internal_outof5.value;
    document.getElementById("subject_internal_marks6").innerHTML = subject_internal6.value + "/" + subject_internal_outof6.value;
    document.getElementById("subject_internal_marks7").innerHTML = subject_internal7.value + "/" + subject_internal_outof7.value;

    //subjects total

    //subject 1
    var subject_1_total = Number(subject_theory1.value) + Number(subject_practical1.value) + Number(subject_internal1.value);
    var subject_outof1_total = Number(subject_theory_outof1.value) + Number(subject_practical_outof1.value) + Number(subject_internal_outof1.value);
    document.getElementById("subject_total_marks1").innerHTML = subject_1_total + "/" + subject_outof1_total;

    //subject 2
    var subject_2_total = Number(subject_theory2.value) + Number(subject_practical2.value) + Number(subject_internal2.value);
    var subject_outof2_total = Number(subject_theory_outof2.value) + Number(subject_practical_outof2.value) + Number(subject_internal_outof2.value);
    document.getElementById("subject_total_marks2").innerHTML = subject_2_total + "/" + subject_outof2_total;

    //subject 3
    var subject_3_total = Number(subject_theory3.value) + Number(subject_practical3.value) + Number(subject_internal3.value);
    var subject_outof3_total = Number(subject_theory_outof3.value) + Number(subject_practical_outof3.value) + Number(subject_internal_outof3.value);
    document.getElementById("subject_total_marks3").innerHTML = subject_3_total + "/" + subject_outof3_total;


    //subject 4
    var subject_4_total = Number(subject_theory4.value) + Number(subject_practical4.value) + Number(subject_internal4.value);
    var subject_outof4_total = Number(subject_theory_outof4.value) + Number(subject_practical_outof4.value) + Number(subject_internal_outof4.value);
    document.getElementById("subject_total_marks4").innerHTML = subject_4_total + "/" + subject_outof4_total;


    //subject 5
    var subject_5_total = Number(subject_theory5.value) + Number(subject_practical5.value) + Number(subject_internal5.value);
    var subject_outof5_total = Number(subject_theory_outof5.value) + Number(subject_practical_outof5.value) + Number(subject_internal_outof5.value);
    document.getElementById("subject_total_marks5").innerHTML = subject_5_total + "/" + subject_outof5_total;


    //subject 6
    var subject_6_total = Number(subject_theory6.value) + Number(subject_practical6.value) + Number(subject_internal6.value);
    var subject_outof6_total = Number(subject_theory_outof6.value) + Number(subject_practical_outof6.value) + Number(subject_internal_outof6.value);
    document.getElementById("subject_total_marks6").innerHTML = subject_6_total + "/" + subject_outof6_total;


    //subject 7
    var subject_7_total = Number(subject_theory7.value) + Number(subject_practical7.value) + Number(subject_internal7.value);
    var subject_outof7_total = Number(subject_theory_outof7.value) + Number(subject_practical_outof7.value) + Number(subject_internal_outof7.value);
    document.getElementById("subject_total_marks7").innerHTML = subject_7_total + "/" + subject_outof7_total;

    //subject grade

    function checkGrade(p) {
        var g;
        if (p < 35) {
            g = "F";
        }
        else if (35 <= p && p < 50) {
            g = "C";
        }
        else if (50 <= p && p < 75) {
            g = "B";
        }
        else if (75 <= p && p < 85) {
            g = "A";
        }
        else if (85 <= p && p <= 100) {
            g = "O";
        }
        return g;
    }

    document.getElementById("subject_grade_marks1").innerHTML = checkGrade((subject_1_total / subject_outof1_total) * 100);
    document.getElementById("subject_grade_marks2").innerHTML = checkGrade((subject_2_total / subject_outof2_total) * 100);
    document.getElementById("subject_grade_marks3").innerHTML = checkGrade((subject_3_total / subject_outof3_total) * 100);
    document.getElementById("subject_grade_marks4").innerHTML = checkGrade((subject_4_total / subject_outof4_total) * 100);
    document.getElementById("subject_grade_marks5").innerHTML = checkGrade((subject_5_total / subject_outof5_total) * 100);
    document.getElementById("subject_grade_marks6").innerHTML = checkGrade((subject_6_total / subject_outof6_total) * 100);
    document.getElementById("subject_grade_marks7").innerHTML = checkGrade((subject_7_total / subject_outof7_total) * 100);

    if (document.getElementById("subject_name_marks1").innerHTML == "") {
        document.getElementById("subject_theory_marks1").innerHTML = "";
        document.getElementById("subject_practical_marks1").innerHTML = "";
        document.getElementById("subject_internal_marks1").innerHTML = "";
        document.getElementById("subject_total_marks1").innerHTML = "";
        document.getElementById("subject_grade_marks1").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks2").innerHTML == "") {
        document.getElementById("subject_theory_marks2").innerHTML = "";
        document.getElementById("subject_practical_marks2").innerHTML = "";
        document.getElementById("subject_internal_marks2").innerHTML = "";
        document.getElementById("subject_total_marks2").innerHTML = "";
        document.getElementById("subject_grade_marks2").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks3").innerHTML == "") {
        document.getElementById("subject_theory_marks3").innerHTML = "";
        document.getElementById("subject_practical_marks3").innerHTML = "";
        document.getElementById("subject_internal_marks3").innerHTML = "";
        document.getElementById("subject_total_marks3").innerHTML = "";
        document.getElementById("subject_grade_marks3").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks4").innerHTML == "") {
        document.getElementById("subject_theory_marks4").innerHTML = "";
        document.getElementById("subject_practical_marks4").innerHTML = "";
        document.getElementById("subject_internal_marks4").innerHTML = "";
        document.getElementById("subject_total_marks4").innerHTML = "";
        document.getElementById("subject_grade_marks4").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks5").innerHTML == "") {
        document.getElementById("subject_theory_marks5").innerHTML = "";
        document.getElementById("subject_practical_marks5").innerHTML = "";
        document.getElementById("subject_internal_marks5").innerHTML = "";
        document.getElementById("subject_total_marks5").innerHTML = "";
        document.getElementById("subject_grade_marks5").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks6").innerHTML == "") {
        document.getElementById("subject_theory_marks6").innerHTML = "";
        document.getElementById("subject_practical_marks6").innerHTML = "";
        document.getElementById("subject_internal_marks6").innerHTML = "";
        document.getElementById("subject_total_marks6").innerHTML = "";
        document.getElementById("subject_grade_marks6").innerHTML = "";
    }
    if (document.getElementById("subject_name_marks7").innerHTML == "") {
        document.getElementById("subject_theory_marks7").innerHTML = "";
        document.getElementById("subject_practical_marks7").innerHTML = "";
        document.getElementById("subject_internal_marks7").innerHTML = "";
        document.getElementById("subject_total_marks7").innerHTML = "";
        document.getElementById("subject_grade_marks7").innerHTML = "";
    }

    var totalOfMarksheet = subject_1_total + subject_2_total + subject_3_total + subject_4_total + subject_5_total + subject_6_total + subject_7_total;
    var totalOutOfMarksheet = subject_outof1_total + subject_outof2_total + subject_outof3_total + subject_outof4_total + subject_outof5_total + subject_outof6_total + subject_outof7_total;

    document.getElementById("total_marks_span").innerHTML = totalOfMarksheet + "/" + totalOutOfMarksheet;
    document.getElementById("total_percent_span").innerHTML = ((totalOfMarksheet / totalOutOfMarksheet) * 100).toFixed(2) + "%";
    document.getElementById("total_grade_span").innerHTML = checkGrade((totalOfMarksheet / totalOutOfMarksheet) * 100);

    getSucessPassFail();

    document.getElementById("teacher_sign_span").innerHTML = footer_teacher.value;
    document.getElementById("hod_sign_span").innerHTML = footer_hod.value;

    $('#GenerateForm').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function checkMarksheetDetails() {
    arrowS.className = "las la-chevron-circle-up";
    detailsMarksheetsFooter.style.display = "flex";
    arrowE.className = "las la-chevron-circle-up";
    detailsMarksheetsExam.style.display = "flex";
    arrowSt.className = "las la-chevron-circle-up";
    detailsMarksheetsStudent.style.display = "flex";
    arrowI.className = "las la-chevron-circle-up";
    detailsMarksheetsInstitution.style.display = "flex";

    if (institution_name.value == "" || student_name.value == "" || student_mother.value == "" || student_num.value == "" || student_department.value == "" || student_class.value == "" || examination_merit.value == "" || examination_semester.value == "") {
        document.getElementById("genError").style.display = "block";
    }
    else {
        // document.getElementById("genBtn").type = "submit";
        document.getElementById("no-marksheets").style.marginBottom = "2rem";
        detailsMarksheets.display = "none";
        document.getElementById("genError").style.display = "none";
        document.getElementById("marksheet").style.display = "block";
        document.getElementById("savetoDB_DIV").style.display = "flex";
    }
}

function DBsavedToggle() {
    var disable = document.getElementById('disable');
    disable.classList.toggle('active');
    var popup = document.getElementById('intoDB-POPUP');
    popup.classList.toggle('active');
}

function saveTextData() {
    var marksheetData = {
        iName: document.getElementById("institution_name_div_span").innerHTML,
        iLoc: document.getElementById("institution_location_div_span").innerHTML,
        iDesc: document.getElementById("institution_description_div_span").innerHTML,
        cTeach: document.getElementById("teacher_sign_span").innerHTML,
        HOD: document.getElementById("hod_sign_span").innerHTML,

        sRn: document.getElementById("student_roll_span").innerHTML,
        sClass: document.getElementById("student_class_span").innerHTML,
        sName: document.getElementById("student_name_span").innerHTML,
        sMother: document.getElementById("student_mothername_span").innerHTML,
        sMerit: document.getElementById("student_merit_span").innerHTML,
        sDepart: document.getElementById("department_name_span").innerHTML,
        sSem: document.getElementById("semester_num_span").innerHTML,

        grade: document.getElementById("total_grade_span").innerHTML,
        total: document.getElementById("total_marks_span").innerHTML,
        percent: document.getElementById("total_percent_span").innerHTML,
        remark: document.getElementById("success_result_span").innerHTML,

        code1: document.getElementById("subject_code_marks1").innerHTML,
        name1: document.getElementById("subject_name_marks1").innerHTML,
        theory1: document.getElementById("subject_theory_marks1").innerHTML,
        practical1: document.getElementById("subject_practical_marks1").innerHTML,
        internal1: document.getElementById("subject_internal_marks1").innerHTML,
        total1: document.getElementById("subject_total_marks1").innerHTML,
        grade1: document.getElementById("subject_grade_marks1").innerHTML,

        code2: document.getElementById("subject_code_marks2").innerHTML,
        name2: document.getElementById("subject_name_marks2").innerHTML,
        theory2: document.getElementById("subject_theory_marks2").innerHTML,
        practical2: document.getElementById("subject_practical_marks2").innerHTML,
        internal2: document.getElementById("subject_internal_marks2").innerHTML,
        total2: document.getElementById("subject_total_marks2").innerHTML,
        grade2: document.getElementById("subject_grade_marks2").innerHTML,

        code3: document.getElementById("subject_code_marks3").innerHTML,
        name3: document.getElementById("subject_name_marks3").innerHTML,
        theory3: document.getElementById("subject_theory_marks3").innerHTML,
        practical3: document.getElementById("subject_practical_marks3").innerHTML,
        internal3: document.getElementById("subject_internal_marks3").innerHTML,
        total3: document.getElementById("subject_total_marks3").innerHTML,
        grade3: document.getElementById("subject_grade_marks3").innerHTML,

        code4: document.getElementById("subject_code_marks4").innerHTML,
        name4: document.getElementById("subject_name_marks4").innerHTML,
        theory4: document.getElementById("subject_theory_marks4").innerHTML,
        practical4: document.getElementById("subject_practical_marks4").innerHTML,
        internal4: document.getElementById("subject_internal_marks4").innerHTML,
        total4: document.getElementById("subject_total_marks4").innerHTML,
        grade4: document.getElementById("subject_grade_marks4").innerHTML,

        code5: document.getElementById("subject_code_marks5").innerHTML,
        name5: document.getElementById("subject_name_marks5").innerHTML,
        theory5: document.getElementById("subject_theory_marks5").innerHTML,
        practical5: document.getElementById("subject_practical_marks5").innerHTML,
        internal5: document.getElementById("subject_internal_marks5").innerHTML,
        total5: document.getElementById("subject_total_marks5").innerHTML,
        grade5: document.getElementById("subject_grade_marks5").innerHTML,

        code6: document.getElementById("subject_code_marks6").innerHTML,
        name6: document.getElementById("subject_name_marks6").innerHTML,
        theory6: document.getElementById("subject_theory_marks6").innerHTML,
        practical6: document.getElementById("subject_practical_marks6").innerHTML,
        internal6: document.getElementById("subject_internal_marks6").innerHTML,
        total6: document.getElementById("subject_total_marks6").innerHTML,
        grade6: document.getElementById("subject_grade_marks6").innerHTML,

        code7: document.getElementById("subject_code_marks7").innerHTML,
        name7: document.getElementById("subject_name_marks7").innerHTML,
        theory7: document.getElementById("subject_theory_marks7").innerHTML,
        practical7: document.getElementById("subject_practical_marks7").innerHTML,
        internal7: document.getElementById("subject_internal_marks7").innerHTML,
        total7: document.getElementById("subject_total_marks7").innerHTML,
        grade7: document.getElementById("subject_grade_marks7").innerHTML
    };

    $.ajax({
        type: "POST",
        url: "marksheet.php",
        data: marksheetData,
        success: function (response) {
            DBsavedToggle();
        }
    });

}

//------------------------------------------------------------------------------------

function changeEmail() {
    document.getElementById("email-update").removeAttribute("readonly");
    document.getElementById("email-update").focus();
    return false;
}

function changePassword() {
    document.getElementById("nPass-update").removeAttribute("readonly");
    document.getElementById("cPass-update").removeAttribute("readonly");
    document.getElementById("nPass-update").focus();
    return false;
}

function changePhone() {
    document.getElementById("phone-update").removeAttribute("readonly");
    document.getElementById("phone-update").focus();
    return false;
}

//----------------------------------------------------------------------
function removePfp() {
    $.ajax({
        url: "deletePfp.php",
    });
    return false;
}

function toggleremovePfp() {
    var disable = document.getElementById('disable');
    disable.classList.toggle('active');
    var popup = document.getElementById('confirm-deletePfp');
    popup.classList.toggle('active');
}

function updateProfileData() {
    // var updatedFname = document.getElementById("name-pf-update").value;
    // var updatedSurname = document.getElementById("surname-pf-update").value;
    // var updatedDOB = document.getElementById("DOB-update").value;
    // var updatedPhone = document.getElementById("phone-update").value;
    // var updatedProfession = document.getElementById("pro-update").value;
    // var updatedInstitution = document.getElementById("institution-update").value;
    $.ajax({
        type: "POST",
        url: "updateProfile.php",
        data: $('#profile-edit').serialize(),
    });
    $('#profile-edit').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function updateProfilePicture() {
    var fd = new FormData();
    fd.append('pfp', $("#pfp")[0].files[0]);
    $.ajax({
        type: "POST",
        url: "updatePfp.php",
        dataType: "JSON",
        data: fd,
        processData: false,
        contentType: false,
    });
    $('#profile-edit').submit(function (e) {
        e.preventDefault();
    });
    return false;
}

function toggleConfirm() {
    var disable = document.getElementById('disable');
    disable.classList.toggle('active');
    var popup = document.getElementById('changed-success');
    popup.classList.toggle('active');
}

function changePfpConfirm() {
    updateProfilePicture();
    toggleConfirm();
}

//for profile-------------------------------------------------------------------------

var animationShake = document.getElementById("confirm");

function reset_animation() {
    animationShake.style.animation = 'none';
    animationShake.offsetHeight; /* trigger reflow */
    animationShake.style.animation = null;
}

$('#confirm-update').bind('change', function () {
    if ($(this).is(':checked'))
        reset_animation();
});

function changeConfirm() {
    var isCheck = document.getElementById("confirm-update");
    if (isCheck.checked == true) {
        updateProfileData();
        toggleConfirm();
    }
    else {
        animationShake.style.animation = "shake .8s ease-in infinite";
    }
}
//to hide and show-----------------------------------------------------------------------

function credShow() {
    document.getElementById("credentials-edit").style.display = "block";
    document.getElementById("dontWant").style.display = "flex";
}

function credHide() {
    document.getElementById("credentials-edit").style.display = "none";
    document.getElementById("dontWant").style.display = "none";
}

//for credentials-------------------------------------------------------------------------
var animationShakeCred = document.getElementById("credentials-confirm");

function reset_animation_cred() {
    animationShakeCred.style.animation = 'none';
    animationShakeCred.offsetHeight; /* trigger reflow */
    animationShakeCred.style.animation = null;
}

$('#credentials-confirm-update').bind('change', function () {
    if ($(this).is(':checked'))
        reset_animation_cred();
});

function changeCredentialsConfirm() {
    var isCheck = document.getElementById("credentials-confirm-update");
    if (isCheck.checked == true) {
        toggleConfirm();
    }
    else {
        animationShakeCred.style.animation = "shake .8s ease-in infinite";
    }
}
//---------------------------------------------------------------------------