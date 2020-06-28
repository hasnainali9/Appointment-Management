<?php 
include_once("../../database/DBOperation.php");


if (isset($_POST['DatasetName'])) {
	# code...
	$obj=new DBOperation();
	$result=$obj->insertINTOdataSet($_POST['UserID'],$_POST['DatasetName']);
	echo $result;
	exit();
}



if (isset($_POST['getProjectForUpdationOFProject'])) {
	# code...
	$obj=new DBOperation();
	$result=$obj->getAllData('dataset',$_POST['UserID']);
	$data='<option disabled="disabled" selected="selected">Select Project</option>';
	if ($result!=null) {
	foreach ($result as $row) {
     $data.="<option value='".$row['id']."' >".$row['dataset_name']."</option>";}}
		echo $data;
	exit();
}

if (isset($_POST['NewProjectNameID'])) {
	# code...
	$obj=new DBOperation();
	$result=$obj->UpdateDataSetName($_POST['EditDataSetNameSelectOptions'],$_POST['NewProjectNameID']);
	echo $result;
	exit();
}


if (isset($_POST['getTableAllFieldNameData'])) {
	$obj=new DBOperation();
	$result=$obj->getAllDataFieldNameSet($_POST['primaryKey']);
	$data="";
	$count=1;
	if ($result!=null){
	foreach ($result as $row) {
		$data.="<tr><th scope='row'>".$count."</th>";
		$data.="<td>".$row['field_name']."</td>";
		$data.="<td>".$row['field_char']."</td></tr>";
		$count++;
     }}

     else if ($result==null) {
     	$data.="<tr><th scope='row'>Null</th>";
		$data.="<td>Null</td>";
		$data.="<td>Null</td></tr>";
     }
	echo $data;
}



if (isset($_POST['FieldName'])) {
	# code...
	$obj=new DBOperation();
	$result=$obj->InsertDataFieldSet($_POST['AddDataFieldsSelectOptions'],$_POST['FieldName'],$_POST['FieldNameType']);
	echo $result;
	exit();
}



if (isset($_POST['getProjectFieldsHtml'])) {
	$obj=new DBOperation();
	$result=$obj->getAllFieldForBooking($_POST['Key']);
	if ($result!=null) {
		$output='';
	foreach ($result as $key => $value) {
		  $output.='<div class="row" style="margin-bottom:1%;"><div class="col-md-2"></div><div class="col-md-6" style="text-align:right;"><label>'.$value['field_name'].' :   </label><input type="'.$value['field_char'].'" name="Field_0'.((int)$key+1).'" style="border-radius: 15px; text-align:center;"></div></div>';
	}
	echo $output;
	}
	else{
		echo "empty";
	}
	
exit();}





if (isset($_POST['Field_01'])) {
	$recordID="";
	$obj=new DBOperation();
	$FieldsChecker=$obj->getAllFieldForBooking($_POST['BookAppointmentProjectsOptions']);
  	$addrecord=$obj->InsertIntoRecords($_POST['BookAppointmentProjectsOptions']);
  if($addrecord=="success"){$recordID=$obj->getLastRecordID();}
	$count=1;
	if ($FieldsChecker!=null) {
		$obj->insertTitle($recordID,$_POST['Title']);
  foreach ($FieldsChecker as $key => $value) {
  	$FieldsChar=$value['field_char'];
  	if ($FieldsChar=="text") {
  	$obj->InsertIntoTextField($recordID,$value['id'],$_POST['Field_0'.$count]);}
  	else if ($FieldsChar=="number") {
	$obj->InsertIntoDecimalField($recordID,$value['id'],$_POST['Field_0'.$count]);}
  		$count++;
  }}//foreach
  	$obj->InsertIntoDatetimeField($recordID,$value['id'],$_POST['dateANDtime']);
  	$obj->InsertIntoStatusField($recordID,$value['id'],$_POST['BookAppointmentProjectsStatus']);
 echo "success"; 	
}





if (isset($_POST['getdataForSearch'])) {
	$obj=new DBOperation();
	$DatasetFieldNames=$obj->getAllDataFieldNameSet($_POST['Key']);
	$output="<thead class='thead-dark'><tr><th class='text-center'>#</th><th class='text-center'>Title</th>";
	if ($DatasetFieldNames!=null){
	foreach ($DatasetFieldNames as $row) {
		$output.="<th>".$row['field_name']."</th>";
     }}
    $output.="<th>Date</th><th>Status</th></tr></thead><tbody>";
    $AllRecordIDs=$obj->GetAllRecordFields($_POST['Key']);///we need to add check for null
    
    $counter=1;
     ///////////////////getting Record ID
    if ($AllRecordIDs==null) {echo "empty";}
    	else{
     
     foreach ($AllRecordIDs as $key => $value) {
     	
     	$recordID=$value['id'];
     /////////////getting Fields Type
     	$output.="<tr><td>".$counter."</td>";
     		$TitleProject=$obj->getTitle($recordID);
     		if ($TitleProject!=null) {
     			$output.="<td>".$TitleProject['title']."</td>";
     		}

     	if ($DatasetFieldNames!=null) {
     	foreach ($DatasetFieldNames as $row) {
		     	if ($row['field_char']=="text") {
		     			$Fieldvalue=$obj->GetDataForAnyTable("text_fields",$recordID);
		     			if ($Fieldvalue!=null) {
		     					foreach ($Fieldvalue as $pkey => $data) {     						
		     					if($data['field_id']==$row['id']){$output.="<td>".$data['value']."</td>";}}}
		     					else{$output.="<td>Null</td>";}}
		     	else if ($row['field_char']=="number"){
		     				$Fieldvalue=$obj->GetDataForAnyTable("decimal_field",$recordID);
		     				if ($Fieldvalue!=null) {
		     					foreach ($Fieldvalue as $pkey => $data) {     						
		     					if($data['field_id']==$row['id']){$output.="<td>".$data['value']."</td>";}}}
		     					else{$output.="<td>00</td>";}}		
     	}}
     	$date=$obj->GetDataForAnyTable("datetime_field",$recordID);
     	if ($date!=null) {
     	$output.="<td>".$date[0]['value']."</td>";}
		
     	$Status=$obj->GetDataForAnyTable("status",$recordID);
     				if ($Status!=null) {

     						if ($Status[0]['value']=="Active") {
     							$output.="<td><select class='StatusSearch bg-success' style='color: white;border-radius: 15px;text-align-last:center;' recordID='".$recordID."'><option class='bg-success' value='Active' selected>Active</option><option class='bg-info' value='Rescheduled' >Rescheduled</option><option class='bg-warning' value='Pending'>Pending</option><option class='bg-danger' value='Canceled'>Canceled</option></select></td>";}
     						else if ($Status[0]['value']=="Pending") {$output.="<td><select class='StatusSearch bg-warning' style='color: white;border-radius: 15px;text-align-last:center;' recordID='".$recordID."'><option class='bg-success' value='Active'>Active</option><option class='bg-info' value='Rescheduled'>Rescheduled</option><option class='bg-warning' value='Pending' selected>Pending</option><option class='bg-danger' value='Canceled'>Canceled</option></select></td>";}
     						else if ($Status[0]['value']=="Canceled") {$output.="<td><select class='StatusSearch bg-danger' style='color: white;border-radius: 15px;text-align-last:center;' recordID='".$recordID."'><option class='bg-success' value='Active'>Active</option><option class='bg-info' value='Rescheduled'>Rescheduled</option><option class='bg-warning' value='Pending'>Pending</option><option class='bg-danger' value='Canceled' selected>Canceled</option></select></td>";}
     						else if ($Status[0]['value']=="Rescheduled") {$output.="<td><select class='StatusSearch bg-info' style='color: white;border-radius: 15px;text-align-last:center;' recordID='".$recordID."'><option class='bg-success' value='Active'>Active</option><option class='bg-info' value='Rescheduled' selected>Rescheduled</option><option class='bg-warning' value='Pending'>Pending</option><option class='bg-danger' value='Canceled'>Canceled</option></select></td>";}
					    }//if not null 	
					     	//$output.="".$Status[0]['value']."";
     	$output.="</tr>";
     	$counter++;
     /////////////getting Fields Type
     }
     ///////////////////getting Record ID
     $output.="</tbody>";
     echo $output;

			}//else not null



			}//main if



if (isset($_POST['UpdateStatusForAppointment'])) {
	$obj=new DBOperation();
	$result=$obj->UpdateSatus($_POST['Key'],$_POST['Value']);
	echo $result;}


if (isset($_POST['NewDateForSearchRescheduled'])) {
	$obj=new DBOperation();
	$obj->UpdateSatus($_POST['recordId'],'Rescheduled');
	$result=$obj->UpdateDateAndTime($_POST['recordId'],$_POST['NewDateForSearchRescheduled']);
	echo $result;
}





if (isset($_POST['getTableForUpdationOfDataSetFields'])) {
	$obj=new DBOperation();
	$result=$obj->getAllDataFieldNameSet($_POST['primaryKey']);
	$count=1;
	$data="<thead class='thead-dark'><tr><th class='text-center'>#</th><th class='text-center'>Field Name</th><th class='text-center'> Field Type</th> <th class='text-center'>Action</th></tr></thead><tbody class='light'>";
	if ($result!=null){
	foreach ($result as $row) {
		$data.="<tr><th scope='row'>".$count."</th>";
		$data.="<td class='text-center'>".$row['field_name']."</td>";
		$data.="<td class='text-center'>".$row['field_char']."</td>";
		$data.="<td class='text-center'><a style='color:white;' FieldID='".$row['id']."' class='btn btn-info edit_Fields' data-toggle='modal' data-target='#UpdateDataFields'>Update</a></td></tr>";
		$count++;
     }}

     else if ($result==null) {
     	$data.="<tr><th scope='row'>Null</th>";
		$data.="<td>Null</td>";
		$data.="<td>Null</td></tr>";
     }
     $data.="</tbody>";
	echo $data;
}



if (isset($_POST['GetDataForDataSetField'])) {
	$obj=new DBOperation();
	$result=$obj->getSingleFieldDataset($_POST['primaryKey']);
	echo json_encode($result);
}



if (isset($_POST['NewFieldName'])) {
	$obj=new DBOperation();
	$result=$obj->UpdateFieldDataset($_POST['Fieldid'],$_POST['NewFieldName'],$_POST['NewFieldNameType']);
	echo $result;
}


if (isset($_POST['getAllUsersForPermission'])) {
	$obj=new DBOperation();
	$result=$obj->getAllUser();

	$data='<option disabled="disabled" selected="selected">Select User</option>';
	if ($result!=null) {
	foreach ($result as $row) {
		if ($_POST['UserID']==$row['id']) {}
		else{$data.="<option value='".$row['id']."' >".$row['Name']."</option>";}}
		}
		echo $data;
}




if (isset($_POST['AddPermissionsDataSetProjectSelectOptions'])) {
		$obj=new DBOperation();
	$result=$obj->getAllData('dataset',$_POST['UserID']);
	$tableID="";
	if ($result!=null) {
	foreach ($result as $row) {
		if ($row['id']==$_POST['AddPermissionsDataSetProjectSelectOptions']) {
			$tableID=$row['id'];}}}//foreach
	$result=$obj->insertIntoPermissions($_POST['UserID'],$tableID,$_POST['AddPermissionsDataSetUserSelectOptions']);
echo $result;

}




if (isset($_POST['getPermissionedProjectForSelect'])) {
	$data='<option disabled="disabled" selected="selected">Select Shared Project</option>';
	$obj=new DBOperation();
	$result=$obj->getDataFromPermissionsTable($_POST['UserID']);
	if ($result!=null) {
	foreach ($result as $value) {
		$DataSetData=$obj->getAllData('dataset',$value['owner_user_id']);
	if ($DataSetData!=null) {
	foreach ($DataSetData as $row) {
		if ($row['id']==$value['table_id']) {$data.="<option value='".$row['id']."' >".$row['dataset_name']."</option>";
		}}}
}}
	print_r($data);
}


if (isset($_POST['getTableForUpdationOfPermissions'])) {
	$obj=new DBOperation();
	$result=$obj->getDataFromUpdatingPermissionsTable($_POST['primaryKey']);
	if ($result!=null) {
		$output="<thead class='thead-dark'><tr><th class='text-center'>#</th><th class='text-center'></th><th class='text-center'>Action</th></tr></thead><tbody>";
	foreach ($result as $key=> $value) {
		$output.="<tr>";
		$users=$obj->getAllUser();
		if ($users!=null) {
				foreach ($users as $userid) {
				if ($userid['id']==$value['persmission_user_id']) {
				 $output.="<td class='text-center'>".((int)$key+1)."</td><td class='text-center'>".$userid['Name']."</td>";
				 $output.="<td class='text-center'><a style='color:white;' PermissionID='".$value['id']."' class='btn btn-danger edit_permissions'>Delete</a></td>";} }}
		$output.="</tr>";		 
		}
		$output.="</tbody>";
	}
	else{
		$output="<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>";
	}
	
	echo $output;
}


if (isset($_POST['DeletePermissions'])) {
	$obj=new DBOperation();
	$result=$obj->DeletedPermissionUsingPKey($_POST['primaryKey']);
	echo $result;
}











if (isset($_POST['getdataForDashboardSearch'])) {
	$obj=new DBOperation();
	$DatasetFieldNames=$obj->getAllDataFieldNameSet($_POST['Key']);
	$output="<thead class='thead-dark'><tr><th class='text-center'>#</th><th class='text-center'>Title</th>";
	if ($DatasetFieldNames!=null){
	foreach ($DatasetFieldNames as $row) {
		$output.="<th>".$row['field_name']."</th>";
     }}
     $output.="<th>Date</th><th>Status</th></tr></thead><tbody>";
     $AllRecordIDs=$obj->GetAllRecordFields($_POST['Key']);///we need to add check for null
     
    $counter=1;
     ///////////////////getting Record ID
    if ($AllRecordIDs==null) {echo "empty";}
    	else{
    	
    
     foreach ($AllRecordIDs as $key => $value) {
     	
     	$recordID=$value['id'];
     /////////////getting Fields Type
     	$output.="<tr><td>".$counter."</td>";
     	if ($DatasetFieldNames!=null) {
     		$TitleProject=$obj->getTitle($recordID);
     		if ($TitleProject!=null) {
     			$output.="<td>".$TitleProject['title']."</td>";
     		}
     	
     	foreach ($DatasetFieldNames as $row) {
		     	if ($row['field_char']=="text") {
		     			$Fieldvalue=$obj->GetDataForAnyTable("text_fields",$recordID);
		     			if ($Fieldvalue!=null) {
		     					foreach ($Fieldvalue as $pkey => $data) {     						
		     					if($data['field_id']==$row['id']){$output.="<td>".$data['value']."</td>";}}}
		     					else{$output.="<td>Null</td>";}}
		     	else if ($row['field_char']=="number"){
		     				$Fieldvalue=$obj->GetDataForAnyTable("decimal_field",$recordID);
		     				if ($Fieldvalue!=null) {
		     					foreach ($Fieldvalue as $pkey => $data) {     						
		     					if($data['field_id']==$row['id']){$output.="<td>".$data['value']."</td>";}}}
		     					else{$output.="<td>00</td>";}}		
     	}}
     	$date=$obj->GetDataForAnyTable("datetime_field",$recordID);
     	if ($date!=null) {
		$output.="<td>".$date[0]['value']."</td>";}
		
     	$Status=$obj->GetDataForAnyTable("status",$recordID);
     	if ($Status!=null) {		
     				$output.="<td>".$Status[0]['value']."</td>";}
     		
     							
					     	
					     	//$output.="".$Status[0]['value']."";
     	$output.="</tr>";
     	$counter++;
     /////////////getting Fields Type
     }
     ///////////////////getting Record ID
     $output.="</tbody>";
     echo $output;

			}//else not null



			}//main if




	if (isset($_POST['getUpcommingAppointmentDates'])) {
		$obj=new DBOperation();
	$dates=$obj->getDatesForUpComingProjects();

	$output="<thead class='thead-dark'><tr><th class='text-center'>#</th><th class='text-center'>Title</th><th class='text-center'>Date&Time</th><th class='text-center'>Remaining Time (H:M:S)</th><th class='text-center'>Action</th></tr></thead><tbody>";
	if ($dates!=null) {
	foreach ($dates as $key => $value) {
		$TitleProject=$obj->getTitle($value['record_id']);
	$recordID=$obj->getdatasetIdThroughRecordId($value['record_id']);
			/******Getting Date and Comparing it with Currrent*****/
			date_default_timezone_set('Asia/Kolkata');
			$CurrentDate=new DateTime(date('Y-m-d H:i:s'));
			  $UnlockDate=new DateTime($value['value']);
			  $Difference=$CurrentDate->diff($UnlockDate);
			/******Getting Date and Comparing it with Currrent*****/
			if ($Difference->invert==0) {
				if ($Difference->d==0) {

		$output.="<tr><td class='text-center'>".((int)$key+1)."</td><td class='text-center'>".$TitleProject['title']."</td><td class='text-center'>".$value['value']."</td><td class='text-center'>".$Difference->h.":".$Difference->i.":".$Difference->s."</td><td class='text-center'><a href='#' datasetID='".$recordID['dataset_id']."' searchValue='".$value['value']."' style='color:white;' class='btn btn-primary VIEWDETAILSBTN'>View Details</a></td></tr>";
			}}
	}}
	$output.="</tbody>";
	echo $output;
	
	}