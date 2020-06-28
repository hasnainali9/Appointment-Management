$(document).ready(function(){
	var table=$('.SearchUpcommingAppointments').DataTable();



var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#SearchSheduleAppointments').html(data);}//success
			});

$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getUpcommingAppointmentDates:1},
			success:function(data){
				$('#DateTable').html(data);}//success
			});








$('#SearchSheduleAppointments').on("change",function(){
	var optionvalue=$('#SearchSheduleAppointments').val();
	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getdataForDashboardSearch:1,Key:optionvalue},
			success:function(data){
				if (data=="empty") { $(".table").html("<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>");}
				else{

				$(".SearchUpcommingAppointments").DataTable().destroy();
				$(".SearchUpcommingAppointments").html(data);
				$(".SearchUpcommingAppointments").DataTable();
				
    $('#DataTables_Table_0_filter input').keyup();
				
 
				}}//success
			});	

});














$("body").delegate(".VIEWDETAILSBTN","click",function(){
var datasetID=$(this).attr("datasetID");
var datevalue=$(this).attr("searchValue");
		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getdataForDashboardSearch:1,Key:datasetID},
			success:function(data){
			if (data=="empty") { $(".table").html("<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>");}
			else{
				$(".SearchUpcommingAppointments").DataTable().destroy();
				$(".SearchUpcommingAppointments").html(data);
				$(".SearchUpcommingAppointments").DataTable();
				$('#SearchSheduleAppointments').val(datasetID);
				$('#DataTables_Table_0_filter input').val(datevalue);
				$('#DataTables_Table_0_filter input').keyup();
			$("html, body").animate({ scrollTop: $(document).height() }, 1000);}}

			});//ajax


});











});