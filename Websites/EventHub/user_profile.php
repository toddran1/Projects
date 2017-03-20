<?php include 'header.php'; ?>

	<h3 style='margin-bottom:2px;display:inline;color:red'><?php echo $_SESSION['username']; ?>: Profile</h3> <br/>

	<table>
		<Tr>
		<Td>
	
<?php

	$query2 = $db->query("SELECT * FROM users WHERE id = '$id'") or die ("something went wrong");
	
	while($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {
		$rowpic = $row2['user_pic'];
	}//while
	
?>
	
	</br><img hight="300" width =300 src = "uploads/<?php echo "$rowpic";?>"</br>	

<?php 
	
	$showformpic = True;
	if(@$_POST['photo'])
		$showformpic = False;
	if(!$showformpic){
  ?>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:</br>
		<input type="file" name="fileToUpload" id="fileToUpload"></br>
		<input type="submit" value="Upload Image" name="submit">
	</form>
	<?php }else { ?>
		<form method="post"></br>
		<input type="submit" value="Change Proflie Picture" name="photo">
	</form>
	
	<?php } ?>
	</td>
	
	<td>

<!--User Info section
		Show user info or user can edit info
-->	

<?php 
	
	$showform = True;
	
	if(@$_POST['update'])
		$showform = False;
	
	if(!$showform){
  ?>

	<!-- update user infor form -->
	<form method = "post">
		<p>First Name: </p>  <input name="firstname" type ="text" value=<?php echo "$firstname";?>><br>
		<p>Last Name: </p>  <input name="lastname" type ="text" value=<?php echo "$lastname";?>><br>
		<p>E-Mail Address: </p>  <input name="email" type ="text" value=<?php echo "$email";?>><br>
		<input type="hidden" name="username" value ="$username"><script type="text/javascript">document.myform.submit();</script>
		<input type="hidden" name="update2" value ="update2">
		<input name="submit" type ="submit" value = "Submit">
	</form>
	
	<?php }else { ?>
	
	<form method = "post">
		<input type="hidden" name="update" value="update">
		<input name="submit" type ="submit" value = "Update Info">
	</form>
	
	<p>Firstname: <?php echo "$firstname"; ?> </p></br>
	<p>Lastname: <?php echo "$lastname"; ?> </p></br>
	<p>Username: <?php echo "$username"; ?> </p></br>
	<p>Email: <?php echo "$email"; ?> </p></br>

	<?php }

	if(@$_POST['update2']) {
		$firstname1 = @$_POST['firstname'];
		$lastname1 = @$_POST['lastname'];
		$email1 = @$_POST['email'];
		
			$change = $db->query("UPDATE users SET firstname='$firstname1', lastname='$lastname1', email='$email1' WHERE id='$id'")or die ("could not update");
			header('Location: login2.php');
	}//if
	?>

	
	</br></br><a href="friends.php" id='navlink'>My Friends</a>
				<a href="user_events.php" id='navlink'>My Events</a>

		</td></tr></table>



<?php include 'footer.php';?>