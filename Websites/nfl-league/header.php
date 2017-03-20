<?php
include('db.php');

?>

<html>
<head>

  <title>
	NFL League
  </title>
  
  
  <!-- Actions for when you first open a page -->
	<link rel="stylesheet" type="text/css" href="includes/main.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
	<script type="text/javascript" src="includes/functions.js"></script>
 

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
              <td class="backgroundcolor">
			  <table width="100%"><tr height="100%"><td>
                <div id="apptitle"><center><b>NFL League</b></center></div>
			        </td>
                <td>
              <!--      <img src="images/something.png"> -->
			    </td>
             </tr>
          </table>
      </td>
            </tr>

			
		<!-- user toolbar -->
		<tr><td class="backgroundlightcolor"><center>
			<a class "a2" href="index.php" id='navlink'>Home</a>
			<a href='index.php?logout=1' id='navlink'>Logout</a>




</center></td></tr>

	<tr>
                <td class="whitebackground">

<div id="tfheader">