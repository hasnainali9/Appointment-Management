$(document).ready(function(){
var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#BookAppointmentProjectsOptions').html(data);}//success
			});




$('#BookAppointmentProjectsOptions').on('change',function(){
var Primarykey=$(this).val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectFieldsHtml:1,Key:Primarykey},
			success:function(data){
				if (data=="empty") {
					$('#saverow').css({"display":"none"});
					$('#daterow').css({"display":"none"});
					$('#TitleRow').css({"display":"none"});
					$('#statusrow').css({"display":"none"});
					$('#dataoutpou').html("");
				   $('#emptyrow').css({"display":"flex"});}
				else{
					$('#emptyrow').css({"display":"none"});
					$('#saverow').css({"display":"flex"});
					$('#TitleRow').css({"display":"flex"});
					$('#statusrow').css({"display":"flex"});
					$('#daterow').css({"display":"flex"});
					$('#dataoutpou').html(data);}
				console.log(data);
					
				}//success
			});
});




$('#bookappointmentFormID').on("submit",function(){

	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$(this).serialize(),
			success:function(data){
							if (data=="success") {
							Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: 'Data Saved',
							  showConfirmButton: false,
							  timer: 1500
							});
							}
							else{
							Swal.fire({
							  position: 'top-end',
							  icon: 'error',
							  title: 'An Error has been occurs',
							  showConfirmButton: false,
							  timer: 1500
							});
							console.log(data);
							}
				}//success
			});
});























































































































});