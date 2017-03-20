<html>
<head>
  <title>
    EventHub
  </title>
  
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

<body bgcolor="#FFCCFF">

<!-- Script to for what to do when login/register is pressed -->
<script type="text/javascript">
    
$(function()
{
    $('form[name="loginform"] input[type="submit"]').click(function(event)
    {
        var $form = $('form[name="loginform"]');
        if($(this).val()=='Login')
        {
            //alert('login was pressed')   document.getElementById('password').value='';;
            $form.attr('action','login.php');
            
		}
        else
        {
            //alert('Register was pressed')   ;
            $form.attr('action','register.php');
        }
    });
    
    $('form[name="loginform"]').submit(function(event)
    {
        //alert("form action : " + $(this).attr('action'));
        //event.preventDefault();
    });
});
</script>

	<!-- login form -->
    <table width="100%", height="100%"><tr><td></td><td bgcolor="#8D5EA6" align="center"><b>Welcome to EventHub!</b>
      <font color='red'><br>Bad username or password, please try again.</font> 
    <form name="loginform" method="post">
	<table width: 100%>
        <tr><td>Username:</td><td><input id="username" type="text" name="username" class="defaulttextbox"></td></tr>
        <tr><td>Password:</td><td><input id="password" type="password" name="password" class="defaulttextbox"></td></tr>
        <input type="hidden" id="hash" name="hash" value="346873877570">
        <input type="hidden" id="hashedpassword" name="hashedpassword" value="">
        <tr>
        <td colspan="2"><input type="submit" name="login" value="Login" />
        <td colspan="2"><input type="submit" name="register" value="Register" />
        </td>
        </tr>
    
    </table></td><td></td></tr></table>
	
	
	
	
	<?php include 'footer.php';?>
 
<!-- < ?php include 'footer.php'; ?> -->