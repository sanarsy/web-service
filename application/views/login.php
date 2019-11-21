<!DOCTYPE html>
<html>
<head>
	<title>IT SERVICE SYSTEM </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link href="<?php echo base_url();?>assets/login_v17/images/a.jpg" rel="icon">
	<link href="<?php echo base_url();?>assets/login_v17/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
	<link href="<?php echo base_url();?>assets/login_v17/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/vendor/animate/animate.css" rel="stylesheet">	
	<link href="<?php echo base_url();?>assets/login_v17/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/vendor/animsition/css/animsition.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/vendor/select2/select2.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/css/util.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/login_v17/css/main.css" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo base_url();?>login/login_akses" method="post">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="password" placeholder="Password" required id="password">
						<span class="focus-input100"></span>
					</div>
					<span class="login100-title p-b-15">
					<input type="checkbox" onclick="myFunction()">						
						Show Password
					</span>
					<script>
					function myFunction() {
					    var x = document.getElementById("password");
					    if (x.type === "password") {
					        x.type = "text";
					    } else {
					        x.type = "password";
					    }
					}
					</script>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt2">
						<?php echo $this->session->flashdata('result_login');?>
						</span>
					</div>	
				</form>
					
				<div class="login100-more" style="background-image: url('assets/login_v17/images/gambar3.jpg');"></div>
			</div>
		</div>
		
	</div>
	
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login_v17/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url();?>assets/login_v17/js/main.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
	

</body>
</html>
