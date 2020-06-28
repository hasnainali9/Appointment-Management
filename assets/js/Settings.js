$(document).ready(function(){


$('#AddUserPermissionsID').on("click",function(){
var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#AddPermissionsDataSetProjectSelectOptions').html(data);}//success
			});
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getAllUsersForPermission:1,UserID:ID},
			success:function(data){
				$('#AddPermissionsDataSetUserSelectOptions').html(data);}//success
			});


});



$('#AddUserPermissionsFormID').on('submit',function(){
	
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$(this).serialize(),
			success:function(data){
				if (data=="success") {
					Swal.fire({
									  position: 'center',
									  icon: 'success',
									  title: 'Permission Set SuccessFully',
									  showConfirmButton: false,
									  timer: 1500
									});
				}
				else{
					console.log(data);
						Swal.fire({
									  position: 'center',
									  icon: 'error',
									  title: 'Failed',
									  showConfirmButton: false,
									  timer: 1500
									});
				}


				}//success
			});	
	

});






































































});