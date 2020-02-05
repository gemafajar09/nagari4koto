<?php
include "koneksi.php";
        $logohitam = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM logo WHERE kategori='HITAM'"));
    $logoputih = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM logo WHERE kategori='PUTIH'"));
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dexignzone.com/zone/EduZone/xhtml/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2017 04:58:13 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="description" content="" />
<meta name="format-detection" content="telephone=no">
<!-- Favicons Icon -->
<link rel="icon" href="images/favicon.html" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="../foto/icon.jpg" />
<!-- Page Title Here -->
<title>Login Admin</title>
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="plugins/scroll/scrollbar.css">
<link class="skin"  rel="stylesheet" type="text/css" href="css/skin/skin-9.css">
<link  rel="stylesheet" type="text/css" href="css/templete.css">
<link rel="stylesheet" type="text/css" href="css/switcher.css"/>
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Poppins:300,400,500,600,700|Roboto:100,300,400,500,700,900" rel="stylesheet">
</head>
<body id="bg">
<div class="page-wrapers">
    <!-- Content -->
    <div id="particles-js" class="page-content dez-login bg-primary-dark">
		<div class="relative z-index3">
		<div class="top-head text-center p-a40">
        <a href="index.php"></a>

		</div>
		<!-- <center> <img src="../img/logo/<?= $logoputih['img_logo'] ?>" width="300" height="180"></center> -->
        <br>
        <div class="login-form style-2">
			<div class="tab-content">
                <div id="login" class="tab-pane active text-center">
                    <form class="p-a30 dez-form" method="post" action="proses_login.php">
                        <!-- <h3 class="form-title m-t0">MKAMAL APPS 1.0</h3> -->
                        <p>Masukkan Username Dan Password. </p>
                        <div class="dez-separator-outer m-b5">
                            <div class="dez-separator bg-primary style-liner"></div>
                        </div>


                        <div class="form-group">
                            <input name="username" required="" class="form-control" placeholder="Username" type="text"/>
                        </div>
                        <div class="form-group">
                            <input name="password" required="" class="form-control " placeholder="Password" type="password"/>
                        </div>
                        <div class="form-group text-left">
                           <input name="login" type="submit" value="Login" class="site-button pull-right">
                        </div>
                       <br>
                    </form>
                    <!-- <div class="bg-primary p-a15 bottom">
						<a data-toggle="tab" href="#developement-1" class="text-white">Create an account</a>
					</div> -->
                </div>
                <div id="forgot-password" class="tab-pane fade ">
                    <form class="p-a30 dez-form text-center">
                        <h3 class="form-title m-t0">Forget Password ?</h3>
                        <div class="dez-separator-outer m-b5">
                            <div class="dez-separator bg-primary style-liner"></div>
                        </div>
                        <p>Enter your e-mail address below to reset your password. </p>
                        <div class="form-group">
                            <input name="dzName" required="" class="form-control" placeholder="Email Id" type="text"/>
                        </div>
                        <div class="form-group text-left"> <a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
                            <button class="site-button pull-right">Submit</button>
                        </div>
                    </form>
                </div>
                <div id="developement-1" class="tab-pane fade">
                    <form class="p-a30 dez-form text-center text-center">
                        <h3 class="form-title m-t0">Silakan Melapor Ke Admin</h3>

                        <div class="form-group text-left ">
							<a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
                            <!-- <button class="site-button pull-right">Submit</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="bottom-footer text-center text-white">
			<p>Copyright 2018 © CV. Mediatama Web Indonesia</p>
		</div>
		</div>
	</div>
	<!-- Content END-->
</div>
<!-- JavaScript  files ========================================= -->
<script type="text/javascript"  src="js/jquery.min.js"></script>
<!-- jquery.min js -->
<script type="text/javascript"  src="js/bootstrap.min.js"></script>
<!-- bootstrap.min js -->
<script type="text/javascript"  src="js/bootstrap-select.min.js"></script>
<!-- Form js -->
<script type="text/javascript"  src="js/jquery.bootstrap-touchspin.js"></script>
<!-- Form js -->
<script type="text/javascript"  src="js/magnific-popup.js"></script>
<!-- magnific-popup js -->
<script type="text/javascript"  src="js/waypoints-min.js"></script>
<!-- waypoints js -->
<script type="text/javascript"  src="js/counterup.min.js"></script>
<!-- counterup js -->
<script type="text/javascript"  src="js/jquery.countdown.js"></script>
<!-- jquery countdown -->
<script type="text/javascript" src="js/imagesloaded.js"></script>
<!-- masonry  -->
<script type="text/javascript" src="js/masonry-3.1.4.js"></script>
<!-- masonry  -->
<script type="text/javascript" src="js/masonry.filter.js"></script>
<!-- masonry  -->
<script type="text/javascript"  src="js/owl.carousel.js"></script>
<!-- OWL  Slider  -->
<script type="text/javascript"  src="js/custom.min.js"></script>
<!-- custom fuctions  -->
<script type="text/javascript"  src="js/dz.carousel.js"></script>
<!-- sortcode fuctions  -->
<!-- switcher fuctions -->
<script type="text/javascript"  src="js/switcher.min.js"></script>
<!-- particles  -->
<script src="js/particles.js"></script>
<script src="js/particles.app.js"></script>

<!-- Style Switcher -->

<!-- Style Switcher End -->
</body>

<!-- Mirrored from dexignzone.com/zone/EduZone/xhtml/login-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Aug 2017 04:58:16 GMT -->
</html>
