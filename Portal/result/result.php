<?php
include '../connect.php';

session_start();
$id = $_SESSION['idSession'];

//MARKSHEET TABLE
$CheckQuery_MARKSHEETS = "SELECT * FROM marksheets WHERE id = '$id' ";
$CheckQuery_run_MARKSHEETS = mysqli_query($conn, $CheckQuery_MARKSHEETS);
$CheckQuery_run_fetchall_MARKSHEETS = mysqli_fetch_assoc($CheckQuery_run_MARKSHEETS);


//MARKS TABLE
$CheckQuery_MARKS = "SELECT * FROM marks WHERE id = '$id' ";
$CheckQuery_run_MARKS = mysqli_query($conn, $CheckQuery_MARKS);
$CheckQuery_run_fetchall_MARKS = mysqli_fetch_assoc($CheckQuery_run_MARKS);

//INSTITUTION TABLE
$CheckQuery_INSTITUTION = "SELECT * FROM institution WHERE id = '$id' ";
$CheckQuery_run_INSTITUTION = mysqli_query($conn, $CheckQuery_INSTITUTION);
$CheckQuery_run_fetchall_INSTITUTION = mysqli_fetch_assoc($CheckQuery_run_INSTITUTION);
$destiny = "marksheetData/";

//SUBJECT 1
$CheckQuery_SUBJECT1 = "SELECT * FROM subject1 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT1 = mysqli_query($conn, $CheckQuery_SUBJECT1);
$CheckQuery_run_fetchall_SUBJECT1 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT1);

//SUBJECT 2
$CheckQuery_SUBJECT2 = "SELECT * FROM subject2 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT2 = mysqli_query($conn, $CheckQuery_SUBJECT2);
$CheckQuery_run_fetchall_SUBJECT2 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT2);

//SUBJECT 3
$CheckQuery_SUBJECT3 = "SELECT * FROM subject3 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT3 = mysqli_query($conn, $CheckQuery_SUBJECT3);
$CheckQuery_run_fetchall_SUBJECT3 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT3);

//SUBJECT 4
$CheckQuery_SUBJECT4 = "SELECT * FROM subject4 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT4 = mysqli_query($conn, $CheckQuery_SUBJECT4);
$CheckQuery_run_fetchall_SUBJECT4 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT4);

//SUBJECT 5
$CheckQuery_SUBJECT5 = "SELECT * FROM subject5 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT5 = mysqli_query($conn, $CheckQuery_SUBJECT5);
$CheckQuery_run_fetchall_SUBJECT5 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT5);

//SUBJECT 6
$CheckQuery_SUBJECT6 = "SELECT * FROM subject6 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT6 = mysqli_query($conn, $CheckQuery_SUBJECT6);
$CheckQuery_run_fetchall_SUBJECT6 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT6);

//SUBJECT 7
$CheckQuery_SUBJECT7 = "SELECT * FROM subject7 WHERE id = '$id' ";
$CheckQuery_run_SUBJECT7 = mysqli_query($conn, $CheckQuery_SUBJECT7);
$CheckQuery_run_fetchall_SUBJECT7 = mysqli_fetch_assoc($CheckQuery_run_SUBJECT7);

?>
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
    <title>Result Portal</title>
    <link rel="icon" type="image/png" href="../titleimage.png" />
    <link rel="stylesheet" href="result.css" />
    <script type="text/javascript" src="../jquery-3.6.0.min.js"></script>
    <script src="result.js"></script>
    <style>
        #logotop {
            background-image: url("<?php echo $destiny . $CheckQuery_run_fetchall_INSTITUTION['institutionlogo']; ?>");
        }
        #logo_again_div {
            background-image: url("<?php echo $destiny . $CheckQuery_run_fetchall_INSTITUTION['institutionlogo']; ?>");
        }
        #teacher_sign_image_png {
            background-image: url("<?php echo $destiny . $CheckQuery_run_fetchall_INSTITUTION['classteachersign']; ?>");
        }
        #hod_sign_image_png {
            background-image: url("<?php echo $destiny . $CheckQuery_run_fetchall_INSTITUTION['hodsign']; ?>");
        }
    </style>
</head>

<body>
    <div id="marksheet">
        <div id="institution">
            <div id="logotop">

            </div>
            <div id="descInsti">
                <div id="institution_name_div">
                    <span id="institution_name_div_span"><?php echo $CheckQuery_run_fetchall_INSTITUTION['institutionname']; ?></span>
                </div>
                <div id="institution_location_div">
                    <span id="institution_location_div_span"><?php echo $CheckQuery_run_fetchall_INSTITUTION['institutionlocation']; ?></span>
                </div>
                <div id="institution_description_div">
                    <span id="institution_description_div_span"><?php echo $CheckQuery_run_fetchall_INSTITUTION['institutiondesciption']; ?></span>
                </div>
            </div>
        </div>
        <div id="student">
            <div id="student_roll">
                <span>Roll No. <br><span id="student_roll_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['rollno']; ?></span></span>
            </div>
            <div id="student_class">
                <span>Class:<br><span id="student_class_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['class']; ?></span></span>
            </div>
            <div id="student_name">
                <span>Student Name:<br><span id="student_name_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['studentname']; ?></span></span>
            </div>
            <div id="student_merit">
                <span>Merit:<br><span id="student_merit_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['merit']; ?></span></span>
            </div>
        </div>
        <div id="marks-head">
            <div id="subject_code">
                <span>Code</span>
            </div>
            <div id="subject_name">
                <span>Subject Name</span>
            </div>
            <div id="subject_theory">
                <span>Theory</span>
            </div>
            <div id="subject_practical">
                <span>Practical</span>
            </div>
            <div id="subject_internal">
                <span>Internal</span>
            </div>
            <div id="subject_total">
                <span>Total</span>
            </div>
            <div id="subject_grade">
                <span>Grade</span>
            </div>
        </div>
        <div id="marks">
            <div id="subject_code_marks">
                <span id="subject_code_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['code']; ?></span><br>
                <span id="subject_code_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['code']; ?></span><br>
                <span id="subject_code_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['code']; ?></span><br>
                <span id="subject_code_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['code']; ?></span><br>
                <span id="subject_code_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['code']; ?></span><br>
                <span id="subject_code_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['code']; ?></span><br>
                <span id="subject_code_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['code']; ?></span>
            </div>
            <div id="subject_name_marks">
                <span id="subject_name_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['name']; ?></span><br>
                <span id="subject_name_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['name']; ?></span><br>
                <span id="subject_name_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['name']; ?></span><br>
                <span id="subject_name_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['name']; ?></span><br>
                <span id="subject_name_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['name']; ?></span><br>
                <span id="subject_name_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['name']; ?></span><br>
                <span id="subject_name_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['name']; ?></span>
            </div>
            <div id="subject_theory_marks">
                <span id="subject_theory_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['theory']; ?></span><br>
                <span id="subject_theory_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['theory']; ?></span><br>
                <span id="subject_theory_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['theory']; ?></span><br>
                <span id="subject_theory_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['theory']; ?></span><br>
                <span id="subject_theory_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['theory']; ?></span><br>
                <span id="subject_theory_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['theory']; ?></span><br>
                <span id="subject_theory_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['theory']; ?></span>
            </div>
            <div id="subject_practical_marks">
                <span id="subject_practical_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['practical']; ?></span><br>
                <span id="subject_practical_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['practical']; ?></span><br>
                <span id="subject_practical_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['practical']; ?></span><br>
                <span id="subject_practical_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['practical']; ?></span><br>
                <span id="subject_practical_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['practical']; ?></span><br>
                <span id="subject_practical_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['practical']; ?></span><br>
                <span id="subject_practical_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['practical']; ?></span>
            </div>
            <div id="subject_internal_marks">
                <span id="subject_internal_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['internal']; ?></span><br>
                <span id="subject_internal_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['internal']; ?></span><br>
                <span id="subject_internal_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['internal']; ?></span><br>
                <span id="subject_internal_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['internal']; ?></span><br>
                <span id="subject_internal_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['internal']; ?></span><br>
                <span id="subject_internal_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['internal']; ?></span><br>
                <span id="subject_internal_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['internal']; ?></span>
            </div>
            <div id="subject_total_marks">
                <span id="subject_total_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['total']; ?></span><br>
                <span id="subject_total_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['total']; ?></span><br>
                <span id="subject_total_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['total']; ?></span><br>
                <span id="subject_total_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['total']; ?></span><br>
                <span id="subject_total_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['total']; ?></span><br>
                <span id="subject_total_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['total']; ?></span><br>
                <span id="subject_total_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['total']; ?></span>
            </div>
            <div id="subject_grade_marks">
                <span id="subject_grade_marks1"><?php echo $CheckQuery_run_fetchall_SUBJECT1['grade']; ?></span><br>
                <span id="subject_grade_marks2"><?php echo $CheckQuery_run_fetchall_SUBJECT2['grade']; ?></span><br>
                <span id="subject_grade_marks3"><?php echo $CheckQuery_run_fetchall_SUBJECT3['grade']; ?></span><br>
                <span id="subject_grade_marks4"><?php echo $CheckQuery_run_fetchall_SUBJECT4['grade']; ?></span><br>
                <span id="subject_grade_marks5"><?php echo $CheckQuery_run_fetchall_SUBJECT5['grade']; ?></span><br>
                <span id="subject_grade_marks6"><?php echo $CheckQuery_run_fetchall_SUBJECT6['grade']; ?></span><br>
                <span id="subject_grade_marks7"><?php echo $CheckQuery_run_fetchall_SUBJECT7['grade']; ?></span><br>
            </div>
        </div>
        <div id="total">
            <div id="department_name">
                <span id="department_name_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['department']; ?></span><span>Semester <span id="semester_num_span"><?php echo $CheckQuery_run_fetchall_MARKSHEETS['semester']; ?></span></span>
            </div>
            <div id="total_head">
                <span>Total :</span>
            </div>
            <div id="total_marks">
                <span id="total_marks_span"><?php echo $CheckQuery_run_fetchall_MARKS['total']; ?></span>
            </div>
        </div>
        <div id="percent">
            <div id="success_result">
                <span id="success_result_span"><?php echo $CheckQuery_run_fetchall_MARKS['remark']; ?></span>
            </div>
            <div id="total_percent">
                <span>Percentage : <span id="total_percent_span"></span><?php echo $CheckQuery_run_fetchall_MARKS['percent']; ?></span>
            </div>
            <div id="total_grade">
                <span>Grade : <span id="total_grade_span"><?php echo $CheckQuery_run_fetchall_MARKS['grade']; ?></span></span>
            </div>
        </div>
        <div id="end">
            <div id="teacher_sign_image">
                <div id="teacher_sign_image_png">

                </div>
                <span id="teacher_sign_span"><?php echo $CheckQuery_run_fetchall_INSTITUTION['classteacher']; ?></span>
            </div>
            <div id="logo_again">
                <div id="logo_again_div">
                    <!-- logo again -->
                </div>
            </div>
            <div id="hod_sign_image">
                <div id="hod_sign_image_png">

                </div>
                <span id="hod_sign_span"><?php echo $CheckQuery_run_fetchall_INSTITUTION['hod']; ?></span>
            </div>
        </div>
    </div>
</body>

</html>