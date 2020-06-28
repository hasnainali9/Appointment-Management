$(document).ready(function(){


///////////////////////////////////////////////////////ajax For Add Data Set////////////////////////////////////



$("#AddDataSetNameForm").on("submit",function(){
if($("#DatasetName").val()==""){
			$("#DatasetNameError").show('fade');
			$("#DatasetName").addClass("border-danger");
			$("#DatasetNameError").html("Please Enter Project Name");
			setTimeout(function(){$("#DatasetName").removeClass("border-danger");
			$("#DatasetNameError").html("");$("#DatasetNameError").hide('fade');},2000);
 }//if 
else{
            
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$("#AddDataSetNameForm").serialize(),
			success:function(data){    
                              var checker="Duplicate entry '".concat($("#DatasetName").val());       
                              	 checker=checker.concat("' for key 'dataset_name'");
							                 if (data==checker) {
							                  $("#DatasetNameError").show('fade');
											  $("#DatasetName").addClass("border-danger");
											  $("#DatasetNameError").html("The Name with Same Project is Already Exist Please Try Entering Another");
							                  setTimeout(function(){$("#DatasetName").removeClass("border-danger");
											  $("#DatasetNameError").html("");$("#DatasetNameError").hide('fade'); $("#DatasetName").val("");},3000);
							                 }
							                 else if (data=="success") {
							                 $("#DatasetNameSuccess").show('fade');
											  $("#DatasetNameSuccess").html("Alert : Project Added SuccessFully");
							                  setTimeout(function(){$("#DatasetNameSuccess").html("");$("#DatasetNameSuccess").hide('fade'); $("#DatasetName").val("");},3000);
							                 }
					}//success
		    });//ajax

 }//else

});





///////////////////////////////////////////////////////ajax For Add Data Set////////////////////////////////////















///////////////////////////////////////////////////////ajax For Update Data Set////////////////////////////////////

$('#EditDataSetNameBTN').on("click",function(){
var ID=$('#UserIDPerson').val();
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#EditDataSetNameSelectOptions').html(data);}//success
			});//AJAX
});

$('#EditDataSetNameSelectOptions').on("change",function(){$('#NewProjectNameID').val($("#EditDataSetNameSelectOptions option:selected" ).text());});




$("#EditDataSetNameFormID").on("submit",function(){ 
if ($('#EditDataSetNameSelectOptions').val()==null) {
			$("#EditDatasetNameError").show('fade');
			$("#EditDatasetNameError").html("Please Select The Project From List");
			setTimeout(function(){$("#EditDatasetNameError").html("");$("#EditDatasetNameError").hide('fade');},3000);
}
else if($("#NewProjectNameID").val()==""){
			$("#EditDatasetNameError").show('fade');
			$("#NewProjectNameID").addClass("border-danger");
			$("#EditDatasetNameError").html("Please Enter New Project Name");
			setTimeout(function(){$("#NewProjectNameID").removeClass("border-danger");
			$("#EditDatasetNameError").html("");$("#EditDatasetNameError").hide('fade');},3000);
 }//else if
else if ($("#EditDataSetNameSelectOptions option:selected" ).text()==$("#NewProjectNameID").val()) {
			$("#EditDatasetNameError").show('fade');
			$("#EditDatasetNameError").html("Please change the Name (the Entered Name is already Set)");
			setTimeout(function(){$("#EditDatasetNameError").html("");$("#EditDatasetNameError").hide('fade');},3000);	
}

else{

		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$("#EditDataSetNameFormID").serialize(),
		
			success:function(data){
                if (data=="success") {var ID=$('#UserIDPerson').val();
												            $.ajax({
															url:"./includes/ajax.php",
															method :"POST",
															data :{getProjectForUpdationOFProject:1,UserID:ID},
															success:function(data){
																$('#EditDataSetNameSelectOptions').html(data);
																$("#EditDatasetNameSuccess").show('fade');
																$("#EditDatasetNameSuccess").html("Data Updated SuccessFully");
																$("#NewProjectNameID").val("");
												                setTimeout(function(){$("#EditDatasetNameSuccess").html("");$("#EditDatasetNameSuccess").hide('fade');},3000);
							                  					}//success
															});//AJAX
                }
                else{console.log(data);
 							                $("#EditDatasetNameError").show('fade');
											$("#EditDatasetNameError").html("An Error has been occured while updating ");
											setTimeout(function(){$("#EditDatasetNameError").html("");$("#EditDatasetNameError").hide('fade');},3000);				
					}
				

				}//success
			});//AJAX		
}


});
///////////////////////////////////////////////////////ajax For Update Data Set////////////////////////////////////


















///////////////////////////////////////////////////////ajax For Add Data Field Set////////////////////////////////////

$('#AddDataFieldsBTN').on("click",function(){
	var ID=$('#UserIDPerson').val();
			$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getProjectForUpdationOFProject:1,UserID:ID},
			success:function(data){
				$('#AddDataFieldsSelectOptions').html(data);}//success
			});//AJAX
});

$('#AddDataFieldsSelectOptions').on("change",function(){

	$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :{getTableAllFieldNameData:1,primaryKey:$(this).val()},
			success:function(data){
				$(".table").css({"display":"inline"});

				$("#TableData").html(data);
				}//success
			});//AJAX
});




$("#AddDataFieldsFormID").on("submit",function(){ 
if ($('#AddDataFieldsSelectOptions').val()==null) {
			$("#AddDataFieldsetError").show('fade');
			$("#AddDataFieldsetError").html("Please Select The Project From List");
			setTimeout(function(){$("#AddDataFieldsetError").html("");$("#AddDataFieldsetError").hide('fade');},3000);
}

else if ($('#FieldName').val()=="") {
			$("#AddDataFieldsetError").show('fade');
			$("#AddDataFieldsetError").html("Please Enter Field Name");
			setTimeout(function(){$("#AddDataFieldsetError").html("");$("#AddDataFieldsetError").hide('fade');},3000);	
}
else if ($('#FieldNameType').val()==null) {
	$("#AddDataFieldsetError").show('fade');
			$("#AddDataFieldsetError").html("Please Select Field Type");
			setTimeout(function(){$("#AddDataFieldsetError").html("");$("#AddDataFieldsetError").hide('fade');},3000);	
}
else{

		$.ajax({
			url:"./includes/ajax.php",
			method :"POST",
			data :$(this).serialize(),
			success:function(data){
 					if (data=="success") {
 								$.ajax({
										url:"./includes/ajax.php",
										method :"POST",
										data :{getTableAllFieldNameData:1,primaryKey:$('#AddDataFieldsSelectOptions').val()},
										success:function(data){
											$(".table").css({"display":"inline"});

											$("#TableData").html(data);
											}//success
										});
 								$("#AddDataFieldsetSuccess").show('fade');
								$("#AddDataFieldsetSuccess").html("Alert : Data Saved SuccessFully");
								setTimeout(function(){$("#AddDataFieldsetSuccess").html("");$("#AddDataFieldsetSuccess").hide('fade');},3000);
 					}
 					else{console.log(data);
 						$("#AddDataFieldsetError").show('fade');
						$("#AddDataFieldsetError").html("Error Uploading Data");
						setTimeout(function(){$("#AddDataFieldsetError").html("");$("#AddDataFieldsetError").hide('fade');},3000);	}
				}//success\


		});
}


});



///////////////////////////////////////////////////////ajax For Add Data Field Set////////////////////////////////////







































































































































































































































































});

