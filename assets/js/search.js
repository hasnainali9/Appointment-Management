$(document).ready(function(){

$('.table').DataTable();

var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#SearchAppointmentProjectsOptions').html(data);}//success
			});


$('#SearchAppointmentProjectsOptions').on("change",function(){
	var optionvalue=$('#SearchAppointmentProjectsOptions').val();
	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getdataForSearch:1,Key:optionvalue},
			success:function(data){
				if (data=="empty") { $(".table").html("<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>");}
				else{
				$(".table").DataTable().destroy();
				$(".table").html(data);
				$(".table").DataTable();
				}}//success
			});	

});



$("body").delegate(".StatusSearch","change",function(){
	var status=$(this).val();
	var recordID=$(this).attr('recordID');
	if (status=="Active") {
		$(this).attr('class', '');$(this).attr('class', 'bg-success StatusSearch');
		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{UpdateStatusForAppointment:1,Key:recordID,Value:status},
			success:function(data){if(data=="success"){Swal.fire({
					   position: 'center',
					  icon: 'success',
					  title: 'Status Updated',
					  showConfirmButton: false,
					  timer: 1500
					});}
				else{console.log(data);}}//success
			});//ajax		
	}

	else if (status=="Pending") {
		$(this).attr('class', '');$(this).attr('class', 'bg-warning StatusSearch');
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{UpdateStatusForAppointment:1,Key:recordID,Value:status},
			success:function(data){if(data=="success"){Swal.fire({
					   position: 'center',
					  icon: 'success',
					  title: 'Status Updated',
					  showConfirmButton: false,
					  timer: 1500
					});}
				else{console.log(data);}}//success
			});//ajax		
				}
	else if (status=="Canceled") {
		$(this).attr('class', '');$(this).attr('class', 'bg-danger StatusSearch');
		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{UpdateStatusForAppointment:1,Key:recordID,Value:status},
			success:function(data){
				if(data=="success"){Swal.fire({
					   position: 'center',
					  icon: 'success',
					  title: 'Status Updated',
					  showConfirmButton: false,
					  timer: 1500
					});}
				else{console.log(data);}
					}//success
				
			});//ajax		
		}
	else if (status=="Rescheduled") {
		$("#UpdateModalDateForSearchRescheduled").addClass("show");
		$('body').addClass('modal-open');
		 $('#fade').html("<div class='modal-backdrop fade show'></div>");
		$("#UpdateModalDateForSearchRescheduled").css({"display":"block"});
		$(this).attr('class', '');$(this).attr('class', 'bg-info StatusSearch');
		$('#RecordIDUpdateDateForSearchRescheduled').val(recordID);
		}	
});




$('#UpdateDateForSearchRescheduled').on('submit',function(){
	if ($('#NewDateForSearchRescheduled').val()!="") {
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$(this).serialize(),
			success:function(data){if(data=="success"){
					$("#UpdateModalDateForSearchRescheduled").removeClass("show");
					$('body').removeClass('modal-open');
					$('#fade').html("");
					$("#UpdateModalDateForSearchRescheduled").css({"display":"none"});
		
				Swal.fire({
					   position: 'center',
					  icon: 'success',
					  title: 'Status Updated',
					  showConfirmButton: false,
					  timer: 1500
					});}
				else{console.log(data);}
				var optionvalue=$('#SearchAppointmentProjectsOptions').val();
	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getdataForSearch:1,Key:optionvalue},
			success:function(data){
				if (data=="empty") { $(".table").html("<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>");}
				else{
				$(".table").DataTable().destroy();
				$(".table").html(data);
				$(".table").DataTable();
				}}//success
			});	
				}//success
			});//ajax
	}
});



































































































});