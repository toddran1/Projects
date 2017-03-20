<?php
include('db.php');

	session_start();
		if(!isset($_SESSION['username'])){
			header("Location:index.php");
}


	$id = $_SESSION['id'];
	$username = $_SESSION['username']; 
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname']; 
	$email = $_SESSION['email'];

?>

<html>
<head>

  <title>
    EventHub
  </title>
  
  
  <!-- Actions for when you first open a page -->
	<link rel="stylesheet" type="text/css" href="includes/main.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
	<script type="text/javascript" src="includes/functions.js"></script>
  <!-- -EBEs code-->
	<link rel="stylesheet" type="text/css" href="includes/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <!-- -sonalis code-->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="css/sonali.css" rel="stylesheet">
	

<script>
$(document).ready(function(){ 
        $(".editToggle").click(function() {
    $(this).next(".editForm").toggle();
    });
   });
</script>

<script>
$(document).ready(function(){ 
        $(".radiobutton1").click(function() {
    $(this).next(".newgroupInput").toggle();
    });
   });

</script>


</head>

<body id="standardbody">


<!-- Simple header for most of the GUI -->
    <center>
        <table class="defaulttable" cellspacing="0" cellpadding="10">
            <tr>
              <td class="ehubbackgroundpurple">
			  <table width="100%"><tr height="100%"><td>
                <div id="apptitle"><center><b>EventHub</b></center></div>
			        </td>
                <td>
              <!--      <img src="images/something.png"> -->
			          </td>
             </tr>
          </table>
      </td>
            </tr>

<!-- user toolbar -->
<tr><td class="ehubbackgroundlight"><center>
<a class "a2" href="user_home.php" id='navlink'>Home</a>
<!-- <a href="event_user.php" id='navlink'>Events</a> -->
<a href="user_profile.php" id='navlink'>User</a>
<a href="user_fc.php" id='navlink'>Chat</a>
<a href='index.php?logout=1' id='navlink'>Logout</a>


<?php
	if(isset($_GET['logout'])){
	  // remove all session variables
		session_unset(); 
	  // destroy the session 
		session_destroy(); 
	}
?>

</center></td></tr>

	<tr>
                <td class="ehubwhitebackground">

<div id="tfheader">