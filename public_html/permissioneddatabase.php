<?php 
session_start();
if (!(isset($_SESSION["UserID"]))) {
header("Location: ../index.php");
}

 ?>

<input type="hidden" value="<?php echo $_SESSION["UserID"];?>" id="UserIDPerson" name="UserID">
<!DOCTYPE html>
<html>
<head>
  <title></title>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.4/mobile-detect.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
<script type="text/javascript" src="../assets/js/permissions.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/datetimepicker.css">
<script type="text/javascript" src="../assets/js/timedatepicker.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<div class="sidebar-container">
  <div class="sidebar-logo">Appointment</a>
  </div>
  <ul class="sidebar-navigation">
    
    <li><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>

    <li><a href="./book.php"><i class="fa fa-briefcase"></i>Add Appointment</a></li>

    <li><a href="./search.php"><i class="fa fa-search"></i>Search Appointment</a></li>
    
    <li id="active"><a href="./permissioneddatabase.php"><i class="fa fa-toggle-on"></i>Shared Projects</a></li>

    <li><a href="./settings.php"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">
<div style="text-align: left; margin-right:2%;" id="slidebarsliderBtn"><a href="#" id="sideBar"><i class="fa fa-bars fa-2x" ></i></a></div>
<div style="text-align: right; margin-right:2%; "><a href="logout.php"><i class="fa fa-power-off fa-2x" ></i></a></div>
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron" style="overflow: scroll;">
<!---------------------------------------------------Main Content------------------------------>
    <div class="heading" style="margin-left: 25%;margin-top: 0%"><h1><i class="fa fa-toggle-on"></i> Shared Projects </h1><br><br></div>
     <div class="row text-center">
          <div class="col-md-12 text-center">
                                <label>Select the Project : </label>
                                <select id="SearchAppointmentProjectsOptions" name="SearchAppointmentProjectsOptions" style="border-radius: 15px;width: 203px; text-align-last:center;"></select></div>
      </div>


<table class="table">
<thead class='thead-dark'><tr><th class='text-center'>Empty</th></tr></thead>
</table>

<!---------------------------------------------------Main Content------------------------------>
     

    </div>

  </div>
</div>




</body>
</html>




<?php include_once("../Modals/SearchDateUpdate.php"); ?>


<span id="fade"></span>




<script type="text/javascript">
  $(document).ready(function(){
     var md = new MobileDetect(window.navigator.userAgent);
     if(md.mobile()){
    $('.content-container').css({"padding-left":"0px"});
    $('.sidebar-container').hide('fade');
    $('#slidebarsliderBtn').show('fade');}
    else{$('#slidebarsliderBtn').hide('fade');}

    $('#sideBar').on("click",function(){

      var currentdisplaySideBar=$('.sidebar-container').css("display");
      var padding_leftSideBar=$('.content-container').css("padding-left");
      if(padding_leftSideBar=="220px"){$('.content-container').css({"padding-left":"0px"});}
      else{$('.content-container').css({"padding-left":"220px"});}
      if (currentdisplaySideBar=="block") {$('.sidebar-container').hide('fade')}
      else{$('.sidebar-container').show('fade');}     
    });
  });
</script>