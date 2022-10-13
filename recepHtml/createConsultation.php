<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WeCare - Create Consultation</title>
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
                            <div style="font-size: 14px; font-weight: 400; line-height: 1.5;"><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
                            <div id="more-details" style="font-size: 14px; font-weight: 400; line-height: 1.5;">
                                Receptionist<i class="fa fa-chevron-down m-l-5"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i
										class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="#!"><i
										class="feather icon-settings m-r-5"></i>Settings</a></li>
                            <li class="list-group-item"><a href="../html/logout.php"><i
										class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item">
                        <a href="homepage.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-home"></i></span><span class="pcoded-mtext">
								Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="createConsultation.php" class="nav-link "><span class="pcoded-micon"><i
									class="fa fa-folder"></i></span><span class="pcoded-mtext">Create
								Consultation</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="recordTime.php" class="nav-link "><span class="pcoded-micon"><i
									class="feather icon-file-text"></i></span><span class="pcoded-mtext">Record Patient
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
                <img src="assets/images/WECARE.png" alt="" class="logo-thumb">
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
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Create Patient Consultation</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="sample-page.html"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Create Consultation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

            <div class="btn-toolbar mb-2 mb-md-0" style="padding-left: 25px;">
                <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal" data-target="#myModal" style="margin-top: 0px;">
					<svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
					</svg>
					New Patient Consultation
				</button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content clearfix" style="width: 150%;">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true" style="padding-left: 5px;">×</span></button>
                                <!--Login Content-->
                                <div class="modal-body">
                                    <h3 class="title">New Patient Consultation</h3><br>

                                    <div class="form-group">
                                        <select class="form-select mb-3">
											<option selected>Select patient</option>
											<option>P011 - Jerry Benson</option>
											<option>P012 - Garret John</option>
											<option>P013 - Johnny Parker</option>
											<option>P014 - Billy Hoyle</option>
											<option>P015 - Conny Elliot </option>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fas fa-user-tag"></i></span>
                                        <input type="Disease" class="form-control" placeholder="Disease">
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-exclamation"></i></span>
                                        <input type="Issue" class="form-control" placeholder="Issue">
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-user-md"></i></span>
                                        <input type="Doctor" class="form-control" placeholder="Doctor">
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                        <input type="Date" class="form-control" placeholder="Date">
                                    </div>
                                    <div class="form-group">
                                        <span class="input-icon"><i class="fa fa-clock-o"
												style="font-size:20px"></i></span>
                                        <input type="Time" class="form-control" placeholder="Time">
                                    </div>

                                    <!--remamber me-->

                                    <!--Login Button-->
                                    <button class="btn">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <table class="table table-hover">
                <thead style="text-align: center;">
                    <tr>
                        <th class="border-gray-200">Patient ID</th>
                        <th class="border-gray-200">Patient Name</th>
                        <th class="border-gray-200">Age</th>
                        <th class="border-gray-200">Phone No.</th>
                        <th class="border-gray-200">Disease</th>
                        <th class="border-gray-200">Issue</th>
                        <th class="border-gray-200">Doctor</th>
                        <th class="border-gray-200">Date</th>
                        <th class="border-gray-200">Time</th>
                        <th class="border-gray-200">Doctor's Comment</th>
                        <th class="border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P001
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Ben Jackson</span>
                        </td>
                        <td><span class="fw-normal">22</span></td>
                        <td><span class="fw-bold">011-2234896</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Rebecca</span></td>
                        <td><span class="fw-bold">12/05/2022</span></td>
                        <td><span class="fw-bold">1pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" data-toggle="modal" data-target="#myModals" style="padding-right: 10px;"></i> <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content clearfix" style="width: 150%;">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true" style="padding-left: 5px;">×</span></button>
                                    <!--Login Content-->
                                    <div class="modal-body">
                                        <h3 class="title">Update Patient Time</h3><br>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fas fa-user-tag"></i></span>
                                            <input type="Disease" class="form-control" placeholder="Fever">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-exclamation"></i></span>
                                            <input type="Issue" class="form-control" placeholder="Headache">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-user-md"></i></span>
                                            <input type="Doctor" class="form-control" placeholder="Dr. Rebecca">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" placeholder="12/05/2022">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="fa fa-clock-o"
													style="font-size:20px"></i></span>
                                            <input type="text" class="form-control" placeholder="1:00pm">
                                        </div>
                                        <div class="form-group">
                                            <span class="input-icon"><i class="far fa-comment-alt"
													style="font-size:20px"></i></span>
                                            <input type="text" class="form-control" placeholder="Doctor Comments">
                                        </div>



                                        <!--Login Button-->
                                        <button class="btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P002
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Jerry Thomason</span>
                        </td>
                        <td><span class="fw-normal">31</span></td>
                        <td><span class="fw-bold">011-2234896</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Rebecca</span></td>
                        <td><span class="fw-bold">02/04/2022</span></td>
                        <td><span class="fw-bold">2pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P003
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Peter Parker</span>
                        </td>
                        <td><span class="fw-normal">24</span></td>
                        <td><span class="fw-bold">016-3888136</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Stein</span></td>
                        <td><span class="fw-bold">24/04/2022</span></td>
                        <td><span class="fw-bold">2:30pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P004
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Mary Jane</span>
                        </td>
                        <td><span class="fw-normal">24</span></td>
                        <td><span class="fw-bold">011-339076</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Rebecca</span></td>
                        <td><span class="fw-bold">17/04/2022</span></td>
                        <td><span class="fw-bold">1:30pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P005
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Harry Garrison</span>
                        </td>
                        <td><span class="fw-normal">27</span></td>
                        <td><span class="fw-bold">011-6653773</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Stein</span></td>
                        <td><span class="fw-bold">29/04/2022</span></td>
                        <td><span class="fw-bold">4pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P006
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Madison Evergarden</span>
                        </td>
                        <td><span class="fw-normal">31</span></td>
                        <td><span class="fw-bold">012-1197845</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Rebecca</span></td>
                        <td><span class="fw-bold">13/04/2022</span></td>
                        <td><span class="fw-bold">3:30pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P007
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Juliet Matson</span>
                        </td>
                        <td><span class="fw-normal">27</span></td>
                        <td><span class="fw-bold">017-1126587</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Rebecca</span></td>
                        <td><span class="fw-bold">13/04/2022</span></td>
                        <td><span class="fw-bold">2pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P008
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Mick Wallace</span>
                        </td>
                        <td><span class="fw-normal">26</span></td>
                        <td><span class="fw-bold">012-7452987</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Stein</span></td>
                        <td><span class="fw-bold">15/04/2022</span></td>
                        <td><span class="fw-bold">1pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P009
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Jone Paddington</span>
                        </td>
                        <td><span class="fw-normal">37</span></td>
                        <td><span class="fw-bold">012-9784566</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Stein</span></td>
                        <td><span class="fw-bold">14/04/2022</span></td>
                        <td><span class="fw-bold">2pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                    <!-- Item -->
                    <tr>
                        <td>
                            <a href="#" class="fw-bold">
								P010
							</a>
                        </td>
                        <td>
                            <span class="fw-normal">Jane Watson</span>
                        </td>
                        <td><span class="fw-normal">26</span></td>
                        <td><span class="fw-bold">012-48335411</span></td>
                        <td><span class="fw-bold">Fever</span></td>
                        <td><span class="fw-bold">Headache</span></td>
                        <td><span class="fw-bold">Dr. Denise</span></td>
                        <td><span class="fw-bold">11/04/2022</span></td>
                        <td><span class="fw-bold">3pm</span></td>
                        <td><span class="fw-bold">--</span></td>

                        <td>
                            <i class="fas fa-pencil-alt ms-text-primary" style="padding-right: 10px;"></i>
                            <i class="far fa-trash-alt ms-text-danger"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                <nav aria-label="Page navigation example">
                    <ul class="pagination mb-0">
                        <li class="page-item">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                <div class="fw-normal small mt-4 mt-lg-0">Showing <b>10</b> out of <b>25</b> entries</div>
            </div>
        </div>
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


</body>

</html>