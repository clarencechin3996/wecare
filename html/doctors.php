<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_wc.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +011 123 2244</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> wecare@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="volunteer_homepage.php" style="font-size: 25px;"><span class="text-primary">We</span>Care</a>





                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="volunteer_homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="doctors.php">Visit Doctor</a>
                        </li>

                        <li class="nav-item">
                            <div class="w3-container" style="padding-right: 0px;">
                                <div class="w3-dropdown-click">
                                    <a class="fa fa-fw fa-user" href="#" style="font-size: 24px;" onclick="myFunction()" class="w3-button w3-black"></a>
                                    <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border" style="position:absolute; overflow: hidden; z-index: 11;">
                                        <a href="signin.html" class="w3-bar-item w3-button">Sign out</a>
                                    </div>
                                </div>
                            </div>
                </div>
                </li>
                <li class="nav-item" style="list-style: none;">
                     <a class="nav-link" style="padding-left: 2px;">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                 </li>

                </ul>
            </div>
            <!-- .navbar-collapse -->
            </div>
            <!-- .container -->
        </nav>
        <script>
            function myFunction() {
                var x = document.getElementById("Demo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
    </header>

    <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="volunteer_homepage.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Visit Doctor</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Your Consultation</h1>
            </div>
            <!-- .container -->
        </div>
        <!-- .banner-section -->
    </div>
    <!-- .page-banner -->

    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_1.jpg" alt="">
                                    <div class="meta" style="padding-left: 28px;">
                                        <a href="feedback.html"><span class="fa fa-check-square-o"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Stein Albert</p>
                                    <span class="text-sm text-grey">Cardiology</span><br>
                                    <span class="text-sm text-grey">Clinic Gen</span><br>
                                    <span class="text-sm text-grey">Day: Monday</span><br>
                                    <span class="text-sm text-grey">Date: 21/04/2022</span><br>
                                    <span class="text-sm text-grey">Time: 2:00pm</span><br>
                                    <span class="text-sm text-grey">Issue: Headache</span><br>
                                    <span class="text-sm text-grey">Disease: High Fever</span><br>

                                    <div class="btn-toolbar mb-2 mb-md-0" style="padding-left: 10px;">
                                        <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal" data-target="#myModal" style="margin-top: 10px; font-size: 12px;">

                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                      </svg>
                      Doctor's Comment

                    </button>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content clearfix" style="width: 100%;">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                                                        <!--Login Content-->
                                                        <div class="modal-body">
                                                            <h3 class="title"> Doctor's Comment
                                                            </h3><br>

                                                            <div class="form-group">
                                                                <p>There are some exercises that can help ease the pain. However, as you are in a lot of pain, painkillers might be better for you as they work more quickly. Doing exercises might also be difficult
                                                                    if you are in pain.</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                            <div class="card-doctor">
                                <div class="header">
                                    <img src="../assets/img/doctors/doctor_3.jpg" alt="">
                                    <div class="meta" style="padding-left: 28px;">
                                        <a href="feedback.html"><span class="fa fa-check-square-o"></span></a>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                                    <span class="text-sm text-grey">General Health</span><br>
                                    <span class="text-sm text-grey">Clinic Poli</span><br>
                                    <span class="text-sm text-grey">Day: Wednesday</span><br>
                                    <span class="text-sm text-grey">Date: 12/05/2022</span><br>
                                    <span class="text-sm text-grey">Time: 4:00pm</span><br>
                                    <span class="text-sm text-grey">Issue: Difficult in breathing</span><br>
                                    <span class="text-sm text-grey">Disease: Asthma</span><br>

                                    <div class="btn-toolbar mb-2 mb-md-0" style="padding-left: 10px;">
                                        <button type="button" class="btn btn-primary btn-lg show-modal" data-toggle="modal" data-target="#myModals" style="margin-top: 10px; font-size: 12px;">


                      Doctor's Comment
                    </button>

                                        <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content clearfix" style="width: 100%;">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                                                        <!--Login Content-->
                                                        <div class="modal-body">
                                                            <h3 class="title"> Doctor's Comment
                                                            </h3><br>
                                                            <div class="form-group">
                                                                <p> ‘I strongly advise you to reduce the number of cigarettes you smoke every day.’</p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- .container -->
    </div>
    <!-- .page-section -->



    <!-- .banner-home -->

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Company</h5>
                    <ul class="footer-menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Editorial Team</a></li>
                        <li><a href="#">Protection</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>More</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Join as Doctors</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Our partner</h5>
                    <ul class="footer-menu">
                        <li><a href="#">One-Fitness</a></li>
                        <li><a href="#">One-Drugs</a></li>
                        <li><a href="#">One-Live</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Contact</h5>
                    <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
                    <a href="#" class="footer-link">701-573-7582</a>
                    <a href="#" class="footer-link">healthcare@temporary.net</a>

                    <h5 class="mt-3">Social Media</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                        <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                    </div>
                </div>
            </div>

            <hr>

            <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved
            </p>
        </div>
    </footer>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>