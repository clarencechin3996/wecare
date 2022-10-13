<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$id = $_SESSION["repID"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WeCare - Record Patient Time</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />



    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/WECARE.png" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link type="text/css" href="sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="assets/css/volt.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .show-modal {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #49a6fd);
            font-size: 18px;
            font-weight: 600;
            text-transform: capitalize;
            padding: 10px 15px;
            margin: 200px auto 0;
            border: none;
            outline: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: block;
            transition: all 0.3s ease 0s;
        }

        .show-modal:hover,
        .show-modal:focus {
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            outline: none;
        }

        .modal-dialog {
            width: 1000px;
            margin: 70px auto 0;
        }

        .modal-dialog {
            transform: scale(0.5);
        }

        .modal-dialog {
            transform: scale(1);
        }

        .modal-dialog .modal-content {
            text-align: center;
            border: none;
        }

        .modal-content .close {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #4cd5ff);
            font-size: 25px;
            font-weight: 400;
            text-shadow: none;
            line-height: 27px;
            height: 25px;
            width: 25px;
            border-radius: 50%;
            overflow: hidden;
            opacity: 1;
            position: absolute;
            left: auto;
            right: 8px;
            top: 8px;
            z-index: 1;
            transition: all 0.3s;
        }

        .modal-content .close:hover {
            color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        }

        .close:focus {
            outline: none;
        }

        .modal-body {
            padding: 60px 40px 40px !important;
        }

        .modal-body .title {
            color: #026fd4;
            font-size: 33px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0 0 10px;
        }

        .modal-body .description {
            color: #9A9EA9;
            font-size: 16px;
            margin: 0 0 20px;
        }

        .modal-body .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        .modal-body .input-icon {
            color: #777;
            font-size: 18px;
            transform: translateY(-50%);
            position: absolute;
            top: 50%;
            left: 20px;
        }

        .modal-body .form-control {
            font-size: 17px;
            height: 45px;
            width: 100%;
            padding: 6px 0 6px 50px;
            margin: 0 auto;
            border: 2px solid #eee;
            border-radius: 5px;
            box-shadow: none;
            outline: none;
        }

        .form-control::placeholder {
            color: #AEAFB1;
        }

        .modal-content .modal-body .btn {
            color: #fff;
            background: linear-gradient(to right, #33a3ff, #0675cf, #4cd5ff);
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            line-height: 38px;
            width: 100%;
            height: 40px;
            padding: 0;
            border: none;
            border-radius: 5px;
            border: none;
            display: inline-block;
            transition: all 0.6s ease 0s;
        }



        .modal-content .modal-body .btn:hover {
            color: #fff;
            letter-spacing: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .modal-content .modal-body .btn:focus {
            outline: none;
        }

        @media only screen and (max-width: 480px) {
            .modal-dialog {
                width: 95% !important;
            }

            .modal-content .modal-body {
                padding: 60px 20px 40px !important;
            }
        }

        .hovertext {
            position: relative;
            border-bottom: 1px dotted black;
        }

        .hovertext:before {
            content: attr(data-hover);
            visibility: hidden;
            opacity: 0;
            width: max-content;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px 5px;
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            z-index: 1;
            left: 0;
            top: -220%;
        }

        .hovertext:hover:before {
            opacity: 1;
            visibility: visible;
        }
    </style>

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span style="font-size: 14px; font-weight: 400; line-height: 1.5;"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                            <div id="more-details" style="font-size: 14px; font-weight: 400; line-height: 1.5;">
                                Receptionist<i class="fa fa-chevron-down m-l-5"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="../html/logout.php"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item">
                        <a href="homepage.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">
                                Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="createConsultation.php" class="nav-link "><span class="pcoded-micon"><i class="fa fa-folder"></i></span><span class="pcoded-mtext" style="font-size: 14px; font-weight: 400; line-height: 1.5;">Create
                                Consultation</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="recordTime.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext" style="font-size: 14px; font-weight: 400; line-height: 1.5;">Record Patient
                                Time</span></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark" style="padding-top: 0px; padding-bottom: 0px;">
        <div class="m-header" style="padding-left: 0px;">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="assets/images/WECAREwhite.png" width="140" height="140" alt="" class="logo" style="padding-top: 10px; ">
                <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">

                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-2.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>Eric Connor</span>
                                <a href="../html/signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                        My Messages</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <section class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Record Patient Time</h5>
                            </div>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="homepage.php"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Record Patient Time</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content clearfix" style="width: 150%;">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="padding-left: 5px;">×</span>
                            </button>
                            <!--Add Content-->
                            <form action="insertConsultationTime.php" method="POST" class="needs-validation" novalidate>

                                <div class="modal-body">
                                    <h3 class="title">New Patient Time</h3><br>
                                    <div class="form-group">
                                        <label for="validationCustom01">Consultation ID</label>
                                        <select id="consultation_id validationCustom01" name="consultation_id" class="form-select mn-3" aria-label="Default select example" required>
                                            <option value="None" selected>-</option>
                                            <?php
                                            require '../html/db.php';
                                            $sql = mysqli_query($conn, "SELECT * FROM consultation");
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                echo "<option value=" . $row['consultation_id'] . ">" . $row['consultation_id'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div><br>
                                    <h5 style="text-align: left;"> T1 - Patient contact center </h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date1" class="form-control" placeholder="Date" id="validationCustom02" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time1" class="form-control" placeholder="Time" id="validationCustom03" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>

                                    <br>
                                    <h5 style="text-align: left;"> T2 - Center contact Doctor</h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date2" class="form-control" placeholder="Date" id="validationCustom04" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time2" class="form-control" placeholder="Time" id="validationCustom05" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>
                                    <br>
                                    <h5 style="text-align: left;"> T3 - Center re-contact patient</h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date3" class="form-control" placeholder="Date" id="validationCustom06" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time3" class="form-control" placeholder="Time" id="validationCustom07" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>
                                    <br>
                                    <h5 style="text-align: left;"> T4 - Patient visit center</h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date4" class="form-control" placeholder="Date" id="validationCustom08" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time4" class="form-control" placeholder="Time" id="validationCustom09" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>
                                    <br>
                                    <h5 style="text-align: left;"> T5 - Doctor consult patient</h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date5" class="form-control" placeholder="Date" id="validationCustom10" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time5" class="form-control" placeholder="Time" id="validationCustom11" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>
                                    <br>
                                    <h5 style="text-align: left;"> T6 - Close</h5>

                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" name="date6" class="form-control" placeholder="Date" id="validationCustom12" required>
                                        <div class="invalid-tooltip">
                                            Please choose a date.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o" style="font-size:20px"></i></span>
                                        <input type="Time" name="time6" class="form-control" placeholder="Time" id="validationCustom13" required>
                                        <div class="invalid-tooltip">
                                            Please choose a time.
                                        </div>
                                    </div>
                                    <!--RECORD Button-->
                                    <div class="modal-footer">
                                        <button type="submit" name="insertdata" class="btn btn-primary">Record</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content clearfix" style="width: 150%;">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="padding-left: 5px;">×</span>
                            </button>
                            <h5 class="modal-title" id="exampleModalLabel"> Delete Consultation Time Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="deleteConsultationTime.php" method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="delete_id" id="delete_id">

                                <h4> Do you want to Delete this Data ??</h4>
                                <div class="modal-footer">
                                    <button type="submit" name="deletedata" class="btn btn-danger"> Yes, Delete it. </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <!-- EDIT POP UP FORM (Bootstrap MODAL) -->

            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content clearfix" style="width: 120%;">
                        <div class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel"> Update Consultation Time </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="padding-left: 5px;">×</span>
                            </button>
                        </div>
                        <?php

                        ?>
                        <form action="updateConsultationTime.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="consultation_time_id" id="consultation_time_id">

                                <h5 style="text-align: left;"> T1 - Patient contact center</h5>

                                <div class="form-group">
                                    <label> Date 1 </label>
                                    <input type="text" name="date1" id="date1" value="" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time 1
                                    </label>
                                    <input type="text" name="time1" id="time1" class="form-control" placeholder="Enter Time">
                                </div>
                                <h5 style="text-align: left;"> T2 - Center contact Doctor</h5>

                                <div class="form-group">
                                    <label> Date2</label>
                                    <input type="text" name="date2" id="date2" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time2</label>
                                    <input type="text" name="time2" id="time2" class="form-control" placeholder="Enter Time">
                                </div>
                                <h5 style="text-align: left;"> T3 - Center re-contact patient</h5>

                                <div class="form-group">
                                    <label> Date3</label>
                                    <input type="text" name="date3" id="date3" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time3</label>
                                    <input type="text" name="time3" id="time3" class="form-control" placeholder="Enter Time">
                                </div>
                                <h5 style="text-align: left;"> T4 - Patient visit center</h5>

                                <div class="form-group">
                                    <label> Date4</label>
                                    <input type="text" name="date4" id="date4" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time4</label>
                                    <input type="text" name="time4" id="time4" class="form-control" placeholder="Enter Time">
                                </div>
                                <h5 style="text-align: left;"> T5 - Doctor consult patient</h5>

                                <div class="form-group">
                                    <label> Date5</label>
                                    <input type="text" name="date5" id="date5" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time5</label>
                                    <input type="text" name="time5" id="time5" class="form-control" placeholder="Enter Time">
                                </div>
                                <h5 style="text-align: left;"> T6 - Close</h5>

                                <div class="form-group">
                                    <label> Date6</label>
                                    <input type="text" name="date6" id="date6" class="form-control" placeholder="Enter Date">
                                </div>

                                <div class="form-group">
                                    <label> Time6</label>
                                    <input type="text" name="time6" id="time6" class="form-control" placeholder="Enter Time">
                                </div>
                                <input id="repID" value="<?php $_SESSION["repID"] ?>" style="">

                                <div class="modal-footer">
                                    <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>

            <!-- [ breadcrumb ] end -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

                <div class="btn-toolbar mb-2 mb-md-0" style="padding-left: 25px;">
                    <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal" data-target="#myModal" style="margin-top: 0px;">
                        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Record New Patient Time
                    </button>


                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive" style="overflow-x:auto;">
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, 'WeCare');

                $query = "SELECT * FROM consultation_time";
                $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table table-hover" id="consultation_time">
                    <thead>
                        <tr>
                            <th>consultation time ID</th>
                            <th>consultation ID</th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Patient contact center">T1 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Patient contact center">T1 Date
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Center contact doctor">T2 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Center contact doctor">T2 Date
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Center re-contact patient">T3 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Center re-contact patient">T3 Date
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Patient visit center">T4 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Patient visit center">T4 Date
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Doctor consult patient">T5 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Doctor consult patient">T5 Date
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Close">T6 Time
                                </span>
                            </th>
                            <th class="border-gray-200"> <span class="hovertext" data-hover="Close">T6 Date
                                </span>
                            </th>
                            <th colspan="2" style="text-align: center;">Action</th>

                    </thead>
                    <?php
                    if ($query_run) {
                        foreach ($query_run as $row) {
                    ?>
                            <tbody>
                                <tr>
                                    <td> <?php echo $row['consultation_time_id']; ?> </td>
                                    <td> <?php echo $row['consultation_id']; ?> </td>
                                    <td> <?php echo $row['time1']; ?> </td>
                                    <td> <?php echo $row['date1']; ?> </td>
                                    <td> <?php echo $row['time2']; ?> </td>
                                    <td> <?php echo $row['date2']; ?> </td>
                                    <td> <?php echo $row['time3']; ?> </td>
                                    <td> <?php echo $row['date3']; ?> </td>
                                    <td> <?php echo $row['time4']; ?> </td>
                                    <td> <?php echo $row['date4']; ?> </td>
                                    <td> <?php echo $row['time5']; ?> </td>
                                    <td> <?php echo $row['date5']; ?> </td>
                                    <td> <?php echo $row['time6']; ?> </td>
                                    <td> <?php echo $row['date6']; ?> </td>
                                    <td style="padding: 6px;">
                                        <button type="button" class="btn btn-secondary editbtn"> <i class="fa fa-edit" style="font-size:20px"></i>
                                        </button>

                                    </td>
                                    <td style="padding: 6px;">
                                        <button type="button" class="btn btn-danger deletebtn"> <i class="fa fa-trash" style="font-size:20px"></i> </button>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                </table>
            </div>

            <!-- [ Main Content ] end -->
            <!-- Warning Section start -->
            <!-- Older IE warning message -->
            <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
            <!-- Warning Section Ends -->

            <!-- Required Js -->
            <script src="assets/js/vendor-all.min.js"></script>
            <script src="assets/js/plugins/bootstrap.min.js"></script>
            <script src="assets/js/pcoded.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
            <script>
                $(document).ready(function() {

                    $('.deletebtn').on('click', function() {
                        $('#deletemodal').modal('show');
                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();
                        console.log(data);
                        $('#delete_id').val(data[0]);
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    $('.editbtn').on('click', function() {
                        $('#editmodal').modal('show');
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();
                        console.log(<?php echo $id ?>);
                        $('#consultation_time_id').val(data[0]);
                        $('#time1').val(data[2]);
                        $('#date1').val(data[3]);
                        $('#time2').val(data[4]);
                        $('#date2').val(data[5]);
                        $('#time3').val(data[6]);
                        $('#date3').val(data[7]);
                        $('#time4').val(data[8]);
                        $('#date4').val(data[9]);
                        $('#time5').val(data[10]);
                        $('#date5').val(data[11]);
                        $('#time6').val(data[12]);
                        $('#date6').val(data[13]);

                    });
                });
            </script>

</body>

</html>