<?php
include 'dashboardRetrive.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-language" content="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet Generator</title>
    <link rel="icon" type="image/png" href="titleimage.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="Dashboard.css" />
    <script type="text/javascript" src="../Javascript/jquery-3.6.0.min.js"></script>
    <script>
        var fullNameReflect = '<?php echo "$result_fullname"; ?>';
        var nameReflect = '<?php echo "$result_fname"; ?>';
        var surnameReflect = '<?php echo "$result_surname"; ?>';
        var emailReflect = '<?php echo "$result_email"; ?>';
        var dobReflect = '<?php echo "$result_dob"; ?>';
        var phoneReflect = '<?php echo "$result_phone"; ?>';
        var professionReflect = '<?php echo "$result_profession"; ?>';
        var institutionReflect = '<?php echo "$result_institution"; ?>';
        var questionReflect = '<?php echo "$result_question"; ?>';
        var answerReflect = '<?php echo "$result_answer"; ?>';
        var noOfRows = '<?php echo $noOfRows; ?>';

        var req = new XMLHttpRequest();
        req.open("GET", "fetch.php");
        req.onload = function() {
            var data = JSON.parse(this.response);
            for (var i = 0; i < data.length; i++) {
                var table = document.getElementById('myTable');
                var row = table.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = data[i].id;
                cell2.innerHTML = data[i].studentname;
                cell3.innerHTML = data[i].department;
                cell4.innerHTML = data[i].status;

                $("#recheckBtn").click(function (e) {
                    $.ajax({
                        type: "POST",
                        url: "recheck.php",
                        data: {
                            id: cell1.innerHTML
                        },
                        success: function (response) {
                            console.log(cell1.innerHTML);
                            // window.location.reload();
                        }
                    });
                });

                $("#postBtn").click(function (e) {
                    $.ajax({
                        type: "POST",
                        url: "post.php",
                        data: {
                            id: cell1.innerHTML
                        },
                        success: function (response) {
                            console.log(cell1.innerHTML);
                            // window.location.reload();
                        }
                    });
                    
                });

                if (cell4.innerHTML == "Posted") {
                    cell5.innerHTML = "<button id= 'recheckBtn' class= 'tableBtns'>RECHECK</button>";
                } else if (cell4.innerHTML == "Pending") {
                    cell5.innerHTML = "<button id= 'postBtn' class= 'tableBtns'>POST</button><button id= 'recheckBtn' class= 'tableBtns'>RECHECK</button>";
                } else if (cell4.innerHTML == "Rechecking") {
                    cell5.innerHTML = "<button id= 'postBtn' class= 'tableBtns'>POST</button>";
                }
                
            }
        };
        req.send();
    </script>
    <style>
        #pfp-css {
            background: url("<?php echo "$result_pfp"; ?>");
            background-size: 100% 100%;
        }
    </style>
</head>

<body id="disable">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2 onclick="Javascript: window.location.reload();"><span class="lar la-chart-bar"></span> Marksheet
                Generator</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="#" id="dashboard" class="active" onclick="dashboardPage()"><span class="las la-igloo"></span><span class="menu-span">Dashboard</span></a></li>
            </ul>
            <ul>
                <li><a href="#" id="generate" onclick="generatePage()"><span class="las la-clipboard-list"></span><span class="menu-span">Generate Marksheet</span></a></li>
            </ul>
            <ul>
                <li><a href="#" id="post" onclick="postPage()"><span class="las la-receipt"></span><span class="menu-span">Post Results</span></a></li>
            </ul>
            <ul>
                <li><a href="#" id="profile" onclick="profilePage()"><span class="las la-user-circle"></span><span class="menu-span">Profile</span></a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>
                <span id="titleOption">Dashboard</span>
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>
            <div class="user-wrapper">
                <img src="<?php echo "$result_pfp"; ?>" width="40px" height="40px" id="header-image" onerror="if (this.src != 'uploads/pfp-placeholder.png') this.src = 'uploads/pfp-placeholder.png';">
                <div>
                    <h4 id="fullNameReflection"></h4>
                    <small id="professionReflection"></small>
                </div>
            </div>
        </header>

        <main>
            <div class="Dashboard-Selected" id="Dashboard-Selected">
                <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1><?php echo $noOfRows; ?></h1>
                            <span>Marksheets Generated</span>
                        </div>
                        <div>
                            <span class="las la-clipboard-list"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php echo $noOfRowsPosted; ?></h1>
                            <span>Results Declared</span>
                        </div>
                        <div>
                            <span class="las la-receipt"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php echo $noOfRowsPending; ?></h1>
                            <span>Results Pending</span>
                        </div>
                        <div>
                            <span class="las la-mail-bulk"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1><?php echo $noOfRowsRechecking; ?></h1>
                            <span>Rechecking</span>
                        </div>
                        <div>
                            <span class="las la-check-double"></span>
                        </div>
                    </div>
                </div>

                <div class="recent">
                    <div class="marksheets">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recent Marksheets</h3>
                                <button onclick="Javascript: document.getElementById('post').click();">See all<span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Student Name</td>
                                            <td>Department</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span><?php echo $fetched1['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched1['department']; ?></span></td>
                                            <td>
                                                <span id="status1" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched1['status']; ?>" == "Posted") {
                                                            $("#status1").addClass("pink");
                                                        } else if ("<?php echo $fetched1['status']; ?>" == "Pending") {
                                                            $("#status1").addClass("purple");
                                                        } else if ("<?php echo $fetched1['status']; ?>" == "Rechecking") {
                                                            $("#status1").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched1['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched2['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched2['department']; ?></span></td>
                                            <td>
                                                <span id="status2" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched2['status']; ?>" == "Posted") {
                                                            $("#status2").addClass("pink");
                                                        } else if ("<?php echo $fetched2['status']; ?>" == "Pending") {
                                                            $("#status2").addClass("purple");
                                                        } else if ("<?php echo $fetched2['status']; ?>" == "Rechecking") {
                                                            $("#status2").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched2['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched3['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched3['department']; ?></span></td>
                                            <td>
                                                <span id="status3" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched3['status']; ?>" == "Posted") {
                                                            $("#status3").addClass("pink");
                                                        } else if ("<?php echo $fetched3['status']; ?>" == "Pending") {
                                                            $("#status3").addClass("purple");
                                                        } else if ("<?php echo $fetched3['status']; ?>" == "Rechecking") {
                                                            $("#status3").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched3['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched4['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched4['department']; ?></span></td>
                                            <td>
                                                <span id="status4" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched4['status']; ?>" == "Posted") {
                                                            $("#status4").addClass("pink");
                                                        } else if ("<?php echo $fetched4['status']; ?>" == "Pending") {
                                                            $("#status4").addClass("purple");
                                                        } else if ("<?php echo $fetched4['status']; ?>" == "Rechecking") {
                                                            $("#status4").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched4['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched5['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched5['department']; ?></span></td>
                                            <td>
                                                <span id="status5" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched5['status']; ?>" == "Posted") {
                                                            $("#status5").addClass("pink");
                                                        } else if ("<?php echo $fetched5['status']; ?>" == "Pending") {
                                                            $("#status5").addClass("purple");
                                                        } else if ("<?php echo $fetched5['status']; ?>" == "Rechecking") {
                                                            $("#status5").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched5['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched6['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched6['department']; ?></span></td>
                                            <td>
                                                <span id="status6" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched6['status']; ?>" == "Posted") {
                                                            $("#status6").addClass("pink");
                                                        } else if ("<?php echo $fetched6['status']; ?>" == "Pending") {
                                                            $("#status6").addClass("purple");
                                                        } else if ("<?php echo $fetched6['status']; ?>" == "Rechecking") {
                                                            $("#status6").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched6['status']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span><?php echo $fetched7['studentname']; ?></span></td>
                                            <td><span><?php echo $fetched7['department']; ?></span></td>
                                            <td>
                                                <span id="status7" class="status">
                                                    <script>
                                                        if ("<?php echo $fetched7['status']; ?>" == "Posted") {
                                                            $("#status7").addClass("pink");
                                                        } else if ("<?php echo $fetched7['status']; ?>" == "Pending") {
                                                            $("#status7").addClass("purple");
                                                        } else if ("<?php echo $fetched7['status']; ?>" == "Rechecking") {
                                                            $("#status7").addClass("orange");
                                                        }
                                                    </script>
                                                </span>
                                                <?php echo $fetched7['status']; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="logout">
                    <button id="logout" onclick="toggleLogout();">Logout</button>
                </div>
                <div id="confirm-logout">
                    <span>Are You Sure, You Wanna Logout?</span>
                    <a href="logout.php" onclick="toggleLogout();">Yes</a>
                    <a onclick="toggleLogout();">No</a>
                </div>
            </div>
            <div class="Generate-Selected" id="Generate-Selected">
                <div id="no-marksheets">
                    <span id="title-for-generate">No Marksheets Generated Yet!</span>
                </div>
                <div id="marksheets-add">
                    <span>Generate Marksheet </span>
                    <i onclick="addMarksheet()" class="las la-plus-circle"></i>
                </div>
                <div id="details-marksheets">
                    <form action="" method="POST" id="GenerateForm" name="GenerateForm" enctype="multipart/form-data" onsubmit="return MarksheetDetailsOnSubmit();">
                        <div id="details-marksheets-institution">
                            <div id="details-marksheets-title">
                                <span>Institution Details </span>
                                <i onclick="plusInstitution()" id="institution-plus" class="las la-chevron-circle-down"></i>
                            </div>
                            <div id="details-marksheets-details-institution" class="details-marksheets-details">
                                <label for="institution-name">Name</label>
                                <input id="institution-name" name="institution-name" type="text" placeholder="Full Name Of The Institution" required>
                                <label for="institution-location">Location</label>
                                <input id="institution-location" name="institution-location" type="text" placeholder="Full Location of the Institution">
                                <label for="institution-description">Description</label>
                                <input id="institution-description" name="institution-description" type="text" placeholder="A Short Description (Eg: NAAC Accredited 'A' Grade)">
                                <label for="institution-logo" class="file-gen">Logo or Emblem</label>
                                <input id="institution-logo" name="institution-logo" class="file-for-gen" type="file" accept="image/*" onchange="imglogo(event);">
                            </div>
                        </div>
                        <div id="details-marksheets-student">
                            <div id="details-marksheets-title">
                                <span>Student Details </span>
                                <i onclick="plusStudent()" id="student-plus" class="las la-chevron-circle-down"></i>
                            </div>
                            <div id="details-marksheets-details-student" class="details-marksheets-details">
                                <label for="student-name">Student's Name</label>
                                <input id="student-name" name="student-name" type="text" placeholder="Full Name Of The Student" required>
                                <label for="student-mother">Mother's First Name</label>
                                <input id="student-mother" name="student-mother" type="text" placeholder="First Name Of The Student's Mother" required>
                                <label for="student-num">Seat No./ Roll No.</label>
                                <input id="student-num" name="student-num" type="text" placeholder="Eg : 9212" required>
                                <label for="student-department">Department</label>
                                <input id="student-department" name="student-department" type="text" placeholder="Eg : Bsc. Computer Science" required>
                                <label for="student-class">Class</label>
                                <input id="student-class" name="student-class" type="text" placeholder="Eg : A,B,C..." required>
                            </div>
                        </div>
                        <div id="details-marksheets-exam">
                            <div id="details-marksheets-title">
                                <span>Examination Details </span>
                                <i onclick="plusExam()" id="exam-plus" class="las la-chevron-circle-down"></i>
                            </div>
                            <div id="details-marksheets-details-exam" class="details-marksheets-details">
                                <label for="examination-merit">Merit</label>
                                <input id="examination-merit" name="examination-merit" type="text" placeholder="Eg : 12th / SY" required>
                                <label for="examination-semester">Semester</label>
                                <input id="examination-semester" name="examination-semester" type="text" placeholder="Eg : 1,2,3,4..." required>
                                <div id="subject-add1" class="subject-add">
                                    <span id="addSubId">Add Subjects</span>
                                    <i onclick="addingSubject1()" id="subject-plus" class="las la-plus-circle"></i>
                                </div>
                                <!-- 1th subject -->
                                <div id="container-subject-add1" class="container-subject-add">
                                    <label for="subject-name1">Subject Name</label>
                                    <input id="subject-name1" name="subject-name1" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code1">Subject Code</label>
                                    <input id="subject-code1" name="subject-code1" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows1" class="subject-marks-rows">
                                        <div id="subject-marks-row1" class="subject-marks-row">
                                            <div><label for="subject-theory1">Theory</label></div>
                                            <div><input id="subject-theory1" name="subject-theory1" type="number"></div>
                                            <div><label for="subject-theory-outof1">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof1" name="subject-theory-outof1" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row1" class="subject-marks-row">
                                            <div><label for="subject-practical1">Practical</label></div>
                                            <div><input id="subject-practical1" name="subject-practical1" type="number"></div>
                                            <div><label for="subject-practical-outof1">Outof</label></div>
                                            <div><input id="subject-practical-outof1" name="subject-practical-outof1" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row1" class="subject-marks-row">
                                            <div><label for="subject-internal1">Internal</label></div>
                                            <div><input id="subject-internal1" name="subject-internal1" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof1">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof1" name="subject-internal-outof1" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add2" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject2()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 2nd subject -->
                                <div id="container-subject-add2" class="container-subject-add">
                                    <label for="subject-name2">Subject Name</label>
                                    <input id="subject-name2" name="subject-name2" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code2">Subject Code</label>
                                    <input id="subject-code2" name="subject-code2" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows2" class="subject-marks-rows">
                                        <div id="subject-marks-row2" class="subject-marks-row">
                                            <div><label for="subject-theory2">Theory</label></div>
                                            <div><input id="subject-theory2" name="subject-theory2" type="number"></div>
                                            <div><label for="subject-theory-outof2">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof2" name="subject-theory-outof2" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row2" class="subject-marks-row">
                                            <div><label for="subject-practical2">Practical</label></div>
                                            <div><input id="subject-practical2" name="subject-practical2" type="number"></div>
                                            <div><label for="subject-practical-outof2">Outof</label></div>
                                            <div><input id="subject-practical-outof2" name="subject-practical-outof2" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row2" class="subject-marks-row">
                                            <div><label for="subject-internal2">Internal</label></div>
                                            <div><input id="subject-internal2" name="subject-internal2" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof2">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof2" name="subject-internal-outof2" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add3" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject3()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 3rd subject -->
                                <div id="container-subject-add3" class="container-subject-add">
                                    <label for="subject-name3">Subject Name</label>
                                    <input id="subject-name3" name="subject-name3" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code3">Subject Code</label>
                                    <input id="subject-code3" name="subject-code3" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows3" class="subject-marks-rows">
                                        <div id="subject-marks-row3" class="subject-marks-row">
                                            <div><label for="subject-theory3">Theory</label></div>
                                            <div><input id="subject-theory3" name="subject-theory3" type="number"></div>
                                            <div><label for="subject-theory-outof3">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof3" name="subject-theory-outof3" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row3" class="subject-marks-row">
                                            <div><label for="subject-practical3">Practical</label></div>
                                            <div><input id="subject-practical3" name="subject-practical3" type="number"></div>
                                            <div><label for="subject-practical-outof3">Outof</label></div>
                                            <div><input id="subject-practical-outof3" name="subject-practical-outof3" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row3" class="subject-marks-row">
                                            <div><label for="subject-internal3">Internal</label></div>
                                            <div><input id="subject-internal3" name="subject-internal3" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof3">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof3" name="subject-internal-outof3" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add4" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject4()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 4th subject -->
                                <div id="container-subject-add4" class="container-subject-add">
                                    <label for="subject-name4">Subject Name</label>
                                    <input id="subject-name4" name="subject-name4" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code4">Subject Code</label>
                                    <input id="subject-code4" name="subject-code4" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows4" class="subject-marks-rows">
                                        <div id="subject-marks-row4" class="subject-marks-row">
                                            <div><label for="subject-theory4">Theory</label></div>
                                            <div><input id="subject-theory4" name="subject-theory4" type="number"></div>
                                            <div><label for="subject-theory-outof4">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof4" name="subject-theory-outof4" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row4" class="subject-marks-row">
                                            <div><label for="subject-practical4">Practical</label></div>
                                            <div><input id="subject-practical4" name="subject-practical4" type="number"></div>
                                            <div><label for="subject-practical-outof4">Outof</label></div>
                                            <div><input id="subject-practical-outof4" name="subject-practical-outof4" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row4" class="subject-marks-row">
                                            <div><label for="subject-internal4">Internal</label></div>
                                            <div><input id="subject-internal4" name="subject-internal4" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof4">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof4" name="subject-internal-outof4" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add5" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject5()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 5th subject -->
                                <div id="container-subject-add5" class="container-subject-add">
                                    <label for="subject-name5">Subject Name</label>
                                    <input id="subject-name5" name="subject-name5" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code5">Subject Code</label>
                                    <input id="subject-code5" name="subject-code5" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows5" class="subject-marks-rows">
                                        <div id="subject-marks-row5" class="subject-marks-row">
                                            <div><label for="subject-theory5">Theory</label></div>
                                            <div><input id="subject-theory5" name="subject-theory5" type="number"></div>
                                            <div><label for="subject-theory-outof5">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof5" name="subject-theory-outof5" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row5" class="subject-marks-row">
                                            <div><label for="subject-practical5">Practical</label></div>
                                            <div><input id="subject-practical5" name="subject-practical5" type="number"></div>
                                            <div><label for="subject-practical-outof5">Outof</label></div>
                                            <div><input id="subject-practical-outof5" name="subject-practical-outof5" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row5" class="subject-marks-row">
                                            <div><label for="subject-internal5">Internal</label></div>
                                            <div><input id="subject-internal5" name="subject-internal5" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof5">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof5" name="subject-internal-outof5" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add6" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject6()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 6th subject -->
                                <div id="container-subject-add6" class="container-subject-add">
                                    <label for="subject-name6">Subject Name</label>
                                    <input id="subject-name6" name="subject-name6" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code6">Subject Code</label>
                                    <input id="subject-code6" name="subject-code6" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows6" class="subject-marks-rows">
                                        <div id="subject-marks-row6" class="subject-marks-row">
                                            <div><label for="subject-theory6">Theory</label></div>
                                            <div><input id="subject-theory6" name="subject-theory6" type="number"></div>
                                            <div><label for="subject-theory-outof6">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof6" name="subject-theory-outof6" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row6" class="subject-marks-row">
                                            <div><label for="subject-practical6">Practical</label></div>
                                            <div><input id="subject-practical6" name="subject-practical6" type="number"></div>
                                            <div><label for="subject-practical-outof6">Outof</label></div>
                                            <div><input id="subject-practical-outof6" name="subject-practical-outof6" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row6" class="subject-marks-row">
                                            <div><label for="subject-internal6">Internal</label></div>
                                            <div><input id="subject-internal6" name="subject-internal6" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof6">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof6" name="subject-internal-outof6" type="number"></div>
                                        </div>
                                    </div>
                                    <div id="subject-add7" class="subject-add">
                                        <span id="addSubId">Add Subject</span>
                                        <i onclick="addingSubject7()" id="subject-plus" class="las la-plus-circle"></i>
                                    </div>
                                </div>
                                <!-- 7th subject -->
                                <div id="container-subject-add7" class="container-subject-add">
                                    <label for="subject-name7">Subject Name</label>
                                    <input id="subject-name7" name="subject-name7" type="text" placeholder="Eg : Physics">
                                    <label for="subject-code7">Subject Code</label>
                                    <input id="subject-code7" name="subject-code7" type="text" placeholder="Eg : 11/A3/PHY">
                                    <div id="subject-marks-rows7" class="subject-marks-rows">
                                        <div id="subject-marks-row7" class="subject-marks-row">
                                            <div><label for="subject-theory7">Theory</label></div>
                                            <div><input id="subject-theory7" name="subject-theory7" type="number"></div>
                                            <div><label for="subject-theory-outof1">Outof</label></div>
                                            <div>
                                                <input id="subject-theory-outof7" name="subject-theory-outof7" type="number">
                                            </div>
                                        </div>
                                        <div id="subject-marks-row7" class="subject-marks-row">
                                            <div><label for="subject-practical7">Practical</label></div>
                                            <div><input id="subject-practical7" name="subject-practical7" type="number"></div>
                                            <div><label for="subject-practical-outof7">Outof</label></div>
                                            <div><input id="subject-practical-outof7" name="subject-practical-outof7" type="number"></div>
                                        </div>
                                        <div id="subject-marks-row7" class="subject-marks-row">
                                            <div><label for="subject-internal7">Internal</label></div>
                                            <div><input id="subject-internal7" name="subject-internal7" type="number"></div>
                                            <div>
                                                <label for="subject-internal-outof7">Outof</label>
                                            </div>
                                            <div><input id="subject-internal-outof7" name="subject-internal-outof7" type="number"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="details-marksheets-footer">
                            <div id="details-marksheets-title">
                                <span>Signature and Authentication Details </span>
                                <i onclick="plusSign()" id="footer-plus" class="las la-chevron-circle-down"></i>
                            </div>
                            <div id="details-marksheets-details-footer" class="details-marksheets-details">
                                <label for="footer-teacher">Name of Class Teacher</label>
                                <input id="footer-teacher" name="footer-teacher" type="text" placeholder="Full Name Of The Class Teacher">
                                <label for="footer-sign-teacher" class="file-gen">Digital Signature Of The Class
                                    Teacher</label>
                                <input id="footer-sign-teacher" name="footer-sign-teacher" class="file-for-gen" type="file" accept="image/*" onchange="imgsign1(event);">
                                <label for="footer-hod">Name of Head Of Department</label>
                                <input id="footer-hod" id="footer-hod" type="text" placeholder="Full Name Of The HOD">
                                <label for="footer-sign-hod" class="file-gen">Digital Signature Of The HOD</label>
                                <input id="footer-sign-hod" name="footer-sign-hod" class="file-for-gen" type="file" accept="image/*" onchange="imgsign2(event);">
                            </div>
                        </div>
                        <div id="genError">
                            <span>These Fields Cannot Be Empty !</span>
                        </div>
                        <div class="details-marksheets-button">
                            <button type="submit" id="genBtn" onclick="checkMarksheetDetails();" class="button-for-generate">Generate</button>
                        </div>
                    </form>
                </div>
                <div id="marksheet">
                    <div id="institution">
                        <div id="logotop">

                        </div>
                        <div id="descInsti">
                            <div id="institution_name_div">
                                <span id="institution_name_div_span"></span>
                            </div>
                            <div id="institution_location_div">
                                <span id="institution_location_div_span"></span>
                            </div>
                            <div id="institution_description_div">
                                <span id="institution_description_div_span"></span>
                            </div>
                        </div>
                    </div>
                    <div id="student">
                        <div id="student_roll">
                            <span>Roll No. <br><span id="student_roll_span"></span></span>
                        </div>
                        <div id="student_class">
                            <span>Class:<br><span id="student_class_span"></span></span>
                        </div>
                        <div id="student_name">
                            <span>Student Name:<br><span id="student_name_span"></span></span>
                            <span style="display: none;" id="student_mothername_span"></span>
                        </div>
                        <div id="student_merit">
                            <span>Merit:<br><span id="student_merit_span"></span></span>
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
                            <span id="subject_code_marks1"></span><br>
                            <span id="subject_code_marks2"></span><br>
                            <span id="subject_code_marks3"></span><br>
                            <span id="subject_code_marks4"></span><br>
                            <span id="subject_code_marks5"></span><br>
                            <span id="subject_code_marks6"></span><br>
                            <span id="subject_code_marks7"></span>
                        </div>
                        <div id="subject_name_marks">
                            <span id="subject_name_marks1"></span><br>
                            <span id="subject_name_marks2"></span><br>
                            <span id="subject_name_marks3"></span><br>
                            <span id="subject_name_marks4"></span><br>
                            <span id="subject_name_marks5"></span><br>
                            <span id="subject_name_marks6"></span><br>
                            <span id="subject_name_marks7"></span>
                        </div>
                        <div id="subject_theory_marks">
                            <span id="subject_theory_marks1"></span><br>
                            <span id="subject_theory_marks2"></span><br>
                            <span id="subject_theory_marks3"></span><br>
                            <span id="subject_theory_marks4"></span><br>
                            <span id="subject_theory_marks5"></span><br>
                            <span id="subject_theory_marks6"></span><br>
                            <span id="subject_theory_marks7"></span>
                        </div>
                        <div id="subject_practical_marks">
                            <span id="subject_practical_marks1"></span><br>
                            <span id="subject_practical_marks2"></span><br>
                            <span id="subject_practical_marks3"></span><br>
                            <span id="subject_practical_marks4"></span><br>
                            <span id="subject_practical_marks5"></span><br>
                            <span id="subject_practical_marks6"></span><br>
                            <span id="subject_practical_marks7"></span>
                        </div>
                        <div id="subject_internal_marks">
                            <span id="subject_internal_marks1"></span><br>
                            <span id="subject_internal_marks2"></span><br>
                            <span id="subject_internal_marks3"></span><br>
                            <span id="subject_internal_marks4"></span><br>
                            <span id="subject_internal_marks5"></span><br>
                            <span id="subject_internal_marks6"></span><br>
                            <span id="subject_internal_marks7"></span>
                        </div>
                        <div id="subject_total_marks">
                            <span id="subject_total_marks1"></span><br>
                            <span id="subject_total_marks2"></span><br>
                            <span id="subject_total_marks3"></span><br>
                            <span id="subject_total_marks4"></span><br>
                            <span id="subject_total_marks5"></span><br>
                            <span id="subject_total_marks6"></span><br>
                            <span id="subject_total_marks7"></span>
                        </div>
                        <div id="subject_grade_marks">
                            <span id="subject_grade_marks1"></span><br>
                            <span id="subject_grade_marks2"></span><br>
                            <span id="subject_grade_marks3"></span><br>
                            <span id="subject_grade_marks4"></span><br>
                            <span id="subject_grade_marks5"></span><br>
                            <span id="subject_grade_marks6"></span><br>
                            <span id="subject_grade_marks7"></span><br>
                        </div>
                    </div>
                    <div id="total">
                        <div id="department_name">
                            <span id="department_name_span"></span><span>Semester <span id="semester_num_span"></span></span>
                        </div>
                        <div id="total_head">
                            <span>Total :</span>
                        </div>
                        <div id="total_marks">
                            <span id="total_marks_span"></span>
                        </div>
                    </div>
                    <div id="percent">
                        <div id="success_result">
                            <span id="success_result_span"></span>
                        </div>
                        <div id="total_percent">
                            <span>Percentage : <span id="total_percent_span"></span></span>
                        </div>
                        <div id="total_grade">
                            <span>Grade : <span id="total_grade_span"></span></span>
                        </div>
                    </div>
                    <div id="end">
                        <div id="teacher_sign_image">
                            <div id="teacher_sign_image_png">

                            </div>
                            <span id="teacher_sign_span"></span>
                        </div>
                        <div id="logo_again">
                            <div id="logo_again_div">
                                <!-- logo again -->
                            </div>
                        </div>
                        <div id="hod_sign_image">
                            <div id="hod_sign_image_png">

                            </div>
                            <span id="hod_sign_span"></span>
                        </div>
                    </div>
                </div>
                <div class="details-marksheets-button" id="savetoDB_DIV">
                    <button type="button" id="savetodbBtn" onclick="saveTextData();" class="button-for-savtodb">Save To Database</button>
                </div>
                <div id="intoDB-POPUP">
                    <span>This Marksheet was Successfully Saved To Database. <small>You Can Post to The Result Portal From 'Post Result' Menu</small></span>
                    <button onclick="DBsavedToggle(); Javascript: window.location.reload();">OK</button>
                </div>
            </div>
            <div class="Post-Selected" id="Post-Selected">
                <div id="no-marksheets-yeah">
                    <span id="title-for-generate">No Marksheets Generated Yet!</span>
                </div>
                <div class="marksheets">
                    <div class="card">
                        <div class="card-header">
                            <h3>Generated Marksheets</h3>
                        </div>
                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Marksheet ID</td>
                                        <td>Student Name</td>
                                        <td>Department</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody id="myTable">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Profile-Selected" id="Profile-Selected">
                <form action="updatePfp.php" method="POST" id="pfp-edit" name="pfp-edit" enctype="multipart/form-data">
                    <div id="pfp-css">
                        <input type="file" name="pfp" id="pfp" class="pfp" value="">
                    </div>
                    <span onclick="toggleremovePfp()" id="removePfp" class="removePfp">&times;</span>
                    <span id="removePfpToolTip" class="removePfpToolTip">Remove Profile Picture</span>
                    <div id="pfp-css-btn">
                        <button type="button" id="pfp-save-btn" class="save-btn" onclick="changePfpConfirm();">Save Profile Picture</button>
                    </div>
                    <div id="confirm-deletePfp">
                        <span>Are You Sure, You Wanna Remove Your Profile Picture?</span>
                        <a onclick="removePfp(); toggleremovePfp();">Yes</a>
                        <a onclick="toggleremovePfp();">No</a>
                    </div>
                </form>
                <form action="updateProfile.php" method="POST" id="profile-edit" name="profile-edit">
                    <table id="info-update">
                        <tr>
                            <td style="width: 200px;">
                                <label for="name-pf-update">Name</label>
                            </td>
                            <td>
                                <input style="width: 250px;" type="text" id="name-pf-update" name="name-pf-update">
                                <input style="margin-left: 2rem; width: 250px;" type="text" id="surname-pf-update" name="surname-pf-update">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="DOB-update">Date of Birth</label>
                            </td>
                            <td>
                                <input type="date" id="DOB-update" name="DOB-update">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="phone-update">Phone Number</label>
                            </td>
                            <td>
                                <input style="width: 300px;" type="number" id="phone-update" name="phone-update" readonly>
                                <a href="" style="margin-left: 2rem;"> <span>verify</span> </a>
                                <a href="" onclick="return changePhone();" style="margin-left: 2rem;"> change </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pro-update">Profession</label>
                            </td>
                            <td>
                                <input style="width: 300px;" type="text" id="pro-update" name="pro-update">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="institution-update">Institution</label>
                            </td>
                            <td>
                                <input style="width: 300px;" type="text" id="institution-update" name="institution-update">
                            </td>
                        </tr>
                    </table>
                    <!-- security question -->
                    <div id="security">
                        <span>Set Up Your Security Question Incase You Forgot Your Password In Future</span>
                        <label for="security-question-update">Question</label>
                        <input type="text" id="security-question-update" name="security-question-update">
                        <label for="security-answer-update">Answer</label>
                        <input type="text" id="security-answer-update" name="security-answer-update">
                    </div>
                    <!-- security question -->
                    <div class="confirm" id="confirm">
                        <input type="checkbox" id="confirm-update">
                        <label for="confirm-update">Check this Box if you are confirmed about this Details.</label>
                    </div>

                    <button type="button" id="save-btn" class="save-btn" onclick="changeConfirm();">Save</button>
                </form>
                <div class="wannaChange">
                    <a href="#cred" id="cred" onclick="credShow();">Want Change Your Email and Password?</a>
                </div>
                <a name="cred">
                    <form name="credentials-edit" id="credentials-edit">
                        <table id="credentials-update">
                            <tr>
                                <td>
                                    <label for="email-update">Email</label>
                                </td>
                                <td>
                                    <input style="width: 300px;" type="text" id="email-update" name="email-update" readonly>
                                    <a href="" onclick="return false;" style="margin-left: 2rem;"> <span>verify</span> </a>
                                    <a href="" onclick="return changeEmail();" style="margin-left: 2rem; "> change </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nPass-update">New Password</label>
                                </td>
                                <td>
                                    <input style="width: 300px;" type="password" id="nPass-update" name="nPass-update" readonly>
                                    <a href="" onclick="return changePassword();" style="margin-left: 2rem; "> change </a>
                                    <span id="error-pass-invalid"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="cPass-update">Confirm Password</label>
                                </td>
                                <td>
                                    <input style="width: 300px;" type="password" id="cPass-update" name="cPass-update" readonly>
                                    <a href="" onclick="return changeEmail();" style="margin-left: 2rem; "> Confirm </a>
                                    <span id="error-pass-incorrect"></span>
                                </td>
                            </tr>
                        </table>
                        <div class="confirm" id="credentials-confirm">
                            <input type="checkbox" id="credentials-confirm-update">
                            <label for="credentials-confirm-update">Check this Box if you are confirmed about this Details.</label>
                        </div>
                        <button type="button" id="credentials-save-btn" class="save-btn" onclick="changeCredentialsConfirm();">Save</button>
                    </form>
                    <div class="wannaChange" id="dontWant">
                        <a href="" id="cred" onclick="credHide(); return false;">Dont Want to Change Your Email and Password?</a>
                    </div>
                    <div id="changed-success">
                        <img src="tick.png" height="170px" width="170px">
                        <span>Changes has been Made</span>
                        <button onclick="toggleConfirm();">OK</button>
                    </div>
            </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js" integrity="sha512-wUa0ktp10dgVVhWdRVfcUO4vHS0ryT42WOEcXjVVF2+2rcYBKTY7Yx7JCEzjWgPV+rj2EDUr8TwsoWF6IoIOPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="Dashboard.js"></script>
</body>

</html>