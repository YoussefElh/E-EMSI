<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-EMSI | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/stylereg.css">
<!--===============================================================================================-->
</head>
<body>
	
	<section class="sign-in" style="margin-top: 5%">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="registration.html" class="signup-image-link">Vous-êtes étudiants ? Créer un compte</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" style="color: #42A5FF">Sign in</h2>
                        <form method="POST"class="login100-form validate-form flex-sb flex-w" action="loginForm.php" id="login-form" target="_self" enctype="multipart/form-data">
							<span class="txt1 p-b-11">
								Login
							</span>
							<div class="wrap-input100 validate-input m-b-36" data-validate = "Login is required">
								<input class="input100" type="text" name="login" >
								<span class="focus-input100"></span>
							</div>
							
							<span class="txt1 p-b-11">
								Password
							</span>
                            <div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
								<span class="btn-show-pass">
									<i class="fa fa-eye"></i>
								</span>
								<input class="input100" type="password" name="passwd" >
								<span class="focus-input100"></span>
							</div>
							<div class="alert alert-danger" style="display: none;" id="ConfMsg">
                                <strong>Erreur!</strong>  Login ou Password incorrect!
                              </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="container-login100-form-btn">
								<button class="login100-form-btn" style="background-color: #42A5FF ">
									Login
								</button>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
	

	<div id="dropDownSelect1"></div>

	 <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/mainreg.js"></script>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>