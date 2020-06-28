$(document).ready(function(){
$('.table').DataTable();

var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#SelectProjectPermissionsOptions').html(data);}//success
			});


$('#SelectProjectPermissionsOptions').on("change",function(){
	var PKey=$(this).val();
	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getTableForUpdationOfPermissions:1,primaryKey:PKey},
			success:function(data){
				$(".table").DataTable().destroy();
				$(".table").html(data);
				$(".table").DataTable();}//success
			});
});



$("body").delegate(".edit_permissions","click",function(){
var value=$(this).attr('permissionid');
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			dataType: 'JSON',
			data :{DeletePermissions:1,primaryKey:value},
			success:function(data){
					if (data=="0") {
							var PKey=$('#SelectProjectPermissionsOptions').val();
							$.ajax({
									url:"./includes/ajax.php",
									method :"POST",
									data :{getTableForUpdationOfPermissions:1,primaryKey:PKey},
									success:function(data){
										$(".table").DataTable().destroy();
										$(".table").html(data);
										$(".table").DataTable();}//success
									});
							Swal.fire({
									  position: 'center',
									  icon: 'success',
									  title: 'Permission Deleted',
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
					}}//success
			});

});




































































































































































































});