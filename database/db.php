<?php

/**
 * 
 */
class Database{
private $con;	
  public function connect(){
   include_once("constants.php");
 $this->con=new mysqli(HOST,USER,PASS,DB);
 if($this->con){  return $this->con;}
return "Data_Connectin_Fail";
	}
public function connectToCustomer(){
   include_once("constants.php");
 $this->con=new mysqli(HOST,USER,PASS,"customers");
 if($this->con){  return $this->con;}
return "Data_Connectin_Fail";
	}

}

$DB=new Database();
$DB->connect();   
?>