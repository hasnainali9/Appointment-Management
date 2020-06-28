<?php 
if (!(isset($_POST['EmailAddress']))) {
//header("Location: index.php");
}else{$Email=$_POST['EmailAddress'];} ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recovery | Appointment</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


<?php 
if (isset($_POST['Newpass'])) {
	$Email=$_POST['Email'];
	$Password=$_POST['Newpass'];
	include("./database/DBOperation.php");
	$obj=new DBOperation();
	$result=$obj->UpdatePassword($Email,$Password);
	if ($result=="success") {
			echo "<script type='text/javascript'>Swal.fire({position: 'center',icon: 'success',title: 'Password Reset successFully',showConfirmButton: false,timer: 1500});</script>";			
				
		
	}
	else{
		echo "";
		echo "<script type='text/javascript'>Swal.fire({position: 'center',icon: 'error',title: 'An Error has been occur Please contact Admin',showConfirmButton: false,timer: 1500});</script>";		
	}
	

}
 ?>


	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" >
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Reset your Password.<br>
						<small style="color: white;font-size: 11px;">Please Enter New password and Confirm password</small>
					</span>
					<input type="hidden" value="hasnain010220002@gmail.com" name="Email">

					<div class="wrap-input100 validate-input" data-validate = "New Password">
						<input class="input100" id="Newpass" type="password" name="Newpass" placeholder="New Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<input type="checkbox" id="showpass" value="Bike"> <small style="font-size: 11px;color: white;">Show Password</small><br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Reset
						</button>
					</div>
<br>
				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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






 <script type="text/javascript">
 	$(document).ready(function(){
 	$('#showpass').on("click",function(){
 		if($(this).prop("checked") == true){
                $('#Newpass').attr("type","text");
            }
            else if($(this).prop("checked") == false){
             $('#Newpass').attr("type","password");   
            }

 	});	

 	});

 </script>