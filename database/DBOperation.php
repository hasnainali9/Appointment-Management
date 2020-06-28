<?php  	
/**
 *  Author : Hasnain Ali 
**  Create with Collaboration of SparkTech
 *  
 */
class DBOperation {
    private $con;	
	function __construct(){
		# code...
		include("db.php");
		$DB=new DataBase();
		$this->con=$DB->connect();
	}//constructor Function

	 function ValidateUser($Email){
		$pre_stmt=$this->con->prepare("SELECT * FROM `users` WHERE `Email`='".$Email."'");
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows[0];}
		}

	 function UpdatePassword($Email,$Newpass){
    	$pre_stmt=$this->con->prepare("UPDATE `users` SET `Password`='".$Newpass."' WHERE `Email`='".$Email."'");
		$result=$pre_stmt->execute() or die ($this->con->error);
	$result=$pre_stmt->get_result();
	   if($result==null){return "success";}
			else {return "Error Data Updation";}	
    }





    function insertINTOdataSet($user_id,$dataset_name){
	    $pre_stmt=$this->con->prepare("INSERT INTO `dataset`(`user_id`, `dataset_name`) VALUES (?,?)");
			$pre_stmt->bind_param("is",$user_id,$dataset_name);
			$result=$pre_stmt->execute() or die($this->con->error);
	    if($result){return "success";}
			else {return "Error Data Insertion";}
    }

     function insertTitle($record_id,$title){
	    $pre_stmt=$this->con->prepare("INSERT INTO `titles`(`record_id`, `title`)  VALUES (?,?)");
			$pre_stmt->bind_param("is",$record_id,$title);
			$result=$pre_stmt->execute() or die($this->con->error);
	    if($result){return "success";}
			else {return "Error Data Insertion";}
    }

     function getTitle($recordID){
	    $pre_stmt=$this->con->prepare("SELECT * FROM `titles` WHERE `record_id`=".$recordID);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows[0];}
    }

    function getAllData($table,$id){
		$pre_stmt=$this->con->prepare("SELECT * FROM `".$table."` WHERE `user_id`=".$id);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}

    }


    function UpdateDataSetName($key,$data){
    	$pre_stmt=$this->con->prepare("UPDATE `dataset` SET `dataset_name`='".$data."' WHERE `id`=".$key);
		$result=$pre_stmt->execute() or die ($this->con->error);
	$result=$pre_stmt->get_result();
	   if($result==null){return "success";}
			else {return "Error Data Updation";}	
    }
    


       function getAllDataFieldNameSet($Key){
		$pre_stmt=$this->con->prepare("SELECT * FROM `dataset_fields` WHERE `dataset_id`=".$Key);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}
		}


 

        function InsertDataFieldSet($datasetId,$FieldName,$FieldType){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `dataset_fields`(`dataset_id`, `field_name`, `field_char`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iss",$datasetId,$FieldName,$FieldType);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}






    function getAllFieldForBooking($key){
		$pre_stmt=$this->con->prepare("SELECT * FROM `dataset_fields` WHERE `dataset_id`=".$key);
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}
		}






function InsertIntoRecords($dataset){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `records`(`dataset_id`) VALUES (?)");
			$pre_stmt->bind_param("i",$dataset);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}

function getLastRecordID(){
    	 $pre_stmt=$this->con->prepare("SELECT * FROM `records` ORDER BY `id` DESC LIMIT 1");
			$result=$pre_stmt->execute() or die($this->con->error);
$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows[0]['id'];}}


function InsertIntoTextField($recordID,$fieldID,$value){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `text_fields`(`record_id`, `field_id`, `value`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iis",$recordID,$fieldID,$value);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}


function InsertIntoDatetimeField($recordID,$fieldID,$value){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `datetime_field`(`record_id`, `field_id`, `value`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iis",$recordID,$fieldID,$value);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}


function InsertIntoDecimalField($recordID,$fieldID,$value){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `decimal_field`(`record_id`, `field_id`, `value`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iid",$recordID,$fieldID,$value);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}


function InsertIntoStatusField($recordID,$fieldID,$value){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `status`(`record_id`, `field_id`, `value`)  VALUES (?,?,?)");
			$pre_stmt->bind_param("iis",$recordID,$fieldID,$value);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}


function InsertIntoBooleanField($recordID,$fieldID,$value){
    	 $pre_stmt=$this->con->prepare("INSERT INTO `boolean_field`(`record_id`, `field_id`, `value`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iii",$recordID,$fieldID,$value);
			$result=$pre_stmt->execute() or die($this->con->error);
	   if($result){return "success";}
			else {return "Error Data Insertion";}	}			




function GetAllRecordFields($dataset_id){
    	 $pre_stmt=$this->con->prepare("SELECT * FROM `records` WHERE `dataset_id`=".$dataset_id);
			$result=$pre_stmt->execute() or die($this->con->error);
	       $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}}



function GetDataForAnyTable($table,$PKey){
		$pre_stmt=$this->con->prepare("SELECT * FROM `".$table."` WHERE `record_id`=".$PKey);
		$result=$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}}


 function UpdateSatus($key,$status){
    	$pre_stmt=$this->con->prepare("UPDATE `status` SET `value`='".$status."' WHERE `record_id`=".$key);
		$result=$pre_stmt->execute() or die ($this->con->error);
	$result=$pre_stmt->get_result();
	   if($result==null){return "success";}
			else {return "Error";}	
    }

function UpdateDateAndTime($key,$status){
    	$pre_stmt=$this->con->prepare("UPDATE `datetime_field` SET `value`='".$status."' WHERE `record_id`=".$key);
		$result=$pre_stmt->execute() or die ($this->con->error);
	$result=$pre_stmt->get_result();
	   if($result==null){return "success";}
			else {return "Error";}	    }



function getSingleFieldDataset($key){
	$pre_stmt=$this->con->prepare("SELECT * FROM `dataset_fields` WHERE `id`=".$key);
		$result=$pre_stmt->execute() or die ($this->con->error);
	   $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows[0];}
}


function UpdateFieldDataset($pkey,$NewfieldName,$NewfieldChar){
	$pre_stmt=$this->con->prepare("UPDATE `dataset_fields` SET `field_name`='".$NewfieldName."',`field_char`='".$NewfieldChar."' WHERE `id`=".$pkey);
		$result=$pre_stmt->execute() or die ($this->con->error);
	$result=$pre_stmt->get_result();
	   if($result==null){return "success";}
			else {return "Error";}	
}

function getAllUser(){
	$pre_stmt=$this->con->prepare("SELECT * FROM `users`");
		$pre_stmt->execute() or die($this->con->error);
		$result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}	
}

  function insertIntoPermissions($owner_id,$tableID,$permissions_ID){
	    $pre_stmt=$this->con->prepare("INSERT INTO `permissions`(`owner_user_id`, `table_id`, `persmission_user_id`) VALUES (?,?,?)");
			$pre_stmt->bind_param("iii",$owner_id,$tableID,$permissions_ID);
			$result=$pre_stmt->execute() or die($this->con->error);
	    if($result){return "success";}
			else {return "Error Data Insertion";}
    }

   function getDataFromPermissionsTable($permissions_ID){
	    $pre_stmt=$this->con->prepare("SELECT * FROM `permissions` WHERE `persmission_user_id`=".$permissions_ID);
			$result=$pre_stmt->execute() or die($this->con->error);
	    $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}	
    }

   function getDataFromUpdatingPermissionsTable($owner_ID){
	    $pre_stmt=$this->con->prepare("SELECT * FROM `permissions` WHERE `owner_user_id`=".$owner_ID);
			$result=$pre_stmt->execute() or die($this->con->error);
	    $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}	
    }


   function DeletedPermissionUsingPKey($primaryKey){
	    $pre_stmt=$this->con->prepare("DELETE FROM `permissions` WHERE `id`=".$primaryKey);
			$result=$pre_stmt->execute() or die($this->con->error);
	       return 0;
    }

    function getDatesForUpComingProjects(){
    	$pre_stmt=$this->con->prepare("SELECT * FROM `datetime_field`");
			$result=$pre_stmt->execute() or die($this->con->error);
	    $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows;}	
    }

    function getdatasetIdThroughRecordId($record_id){
    		$pre_stmt=$this->con->prepare("SELECT * FROM `records` WHERE `id`= ".$record_id);
			$result=$pre_stmt->execute() or die($this->con->error);
	    $result=$pre_stmt->get_result();
		$row=array();
		if($result -> num_rows > 0){
			while($row=$result->fetch_assoc()){$rows[]=$row;}
		   return $rows[0];}	
    }















}//class

?>