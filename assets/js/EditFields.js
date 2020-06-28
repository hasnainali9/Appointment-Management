$(document).ready(function(){
$('.table').DataTable();

var ID=$('#UserIDPerson').val();
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#EditFieldsDataSetSelect').html(data);}//success
			});


$('#EditFieldsDataSetSelect').on("change",function(){
	var PKey=$(this).val();
	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getTableForUpdationOfDataSetFields:1,primaryKey:PKey},
			success:function(data){
					$(".table").DataTable().destroy();
				$(".table").html(data);
				$(".table").DataTable();}//success
			});
});



$("body").delegate(".edit_Fields","click",function(){
var value=$(this).attr('FieldID');
$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			dataType: 'JSON',
			data :{GetDataForDataSetField:1,primaryKey:value},
			success:function(data){
					$('#Fieldid').val(data['id']);
					$('#NewFieldName').val(data['field_name']);
					$('#NewFieldNameType').val(data['field_char']);}//success
			});

});

$('#UpdateDataFieldsFormID').on("submit",function(){
		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$(this).serialize(),
			success:function(data){
					if (data=="success") {
						var PKey=$('#EditFieldsDataSetSelect').val();
						$.ajax({
								url:"./includes/ajax.php",
								method :"POST",
								data :{getTableForUpdationOfDataSetFields:1,primaryKey:PKey},
								success:function(data){
										$(".table").DataTable().destroy();
									$(".table").html(data);
									$(".table").DataTable();}//success
								});
											$("#UpdateDataFieldsetSuccess").show('fade');
											  $("#UpdateDataFieldsetSuccess").html("Alert : Field updated SuccessFully");
							                  setTimeout(function(){$("#UpdateDataFieldsetSuccess").html("");$("#UpdateDataFieldsetSuccess").hide('fade'); $("#NewFieldName").val("");},3000);
					}
					else{
						console.log(data);
						$("#UpdateDataFieldsetSuccess").show('fade');
											  $("#UpdateDataFieldsetError").html("Alert : Fail to Update Field");
							                  setTimeout(function(){$("#UpdateDataFieldsetError").html("");$("#UpdateDataFieldsetError").hide('fade'); $("#NewFieldName").val("");},3000);

					}

			}//success
			});	
});



























































































































});