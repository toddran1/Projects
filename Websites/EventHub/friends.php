<?php include 'header.php';?>

	<p>My Friends: </p>

<?php

	$queryshow = $db->query("SELECT * FROM friends_list WHERE id = '$id'");
	$numrowsshow = $queryshow->rowCount();
		
	if($numrowsshow ==0) 
		echo "No friends Yet!";
	else {
		while($rowshow = $queryshow->fetch(PDO::FETCH_ASSOC))
				echo "$rowshow[myfriend]</br>";
	}//else		
	
	echo "</br></br>";

	//add friend form
	$showform = True;
	if(@$_POST['added'])
	$showform = False;
	
	if(!$showform){
?>

	<!-- add friend form -->
	<form method = "post">
		<p>Add by Username: </p>  <input name="addun" type ="text"><br>
		<input type="hidden" name="added">
		<input name="submit" type ="submit" value = "Submit">
	</form>
	
<?php }else { ?>
	
	<form method = "post">
		<input type="hidden" name="added" value="added">
		<input name="submit" type ="submit" value = "Add More Friends">
	</form>
	
	

<?php }//ifelse
	
	//add friend code
	//checks if user exist or if already friends
	if($addusername = @$_POST['addun']) {
		
		$queryadd = $db->query("SELECT * FROM friends_list WHERE id = '$id' AND myfriend='$addusername'") or die ("something went wrong");
		$numrowsadd = $queryadd->rowCount();
		
		if($numrowsadd !==0) 
			echo "You are already friends with $addusername!";
			
		else { 
				$queryadd2 = $db->query("SELECT * FROM users WHERE username='$addusername'");
				$numrowsadd2 = $queryadd2->rowCount();
				
				if($numrowsadd2 ==0)
					echo "Person does not exit!";
				else { 
					echo "You and $addusername are now friends!";
					$insert = $db->query("INSERT INTO friends_list VALUES('$id','$username','$addusername')");

					$queryadd3 = $db->query("SELECT * FROM users WHERE username = '$addusername'") or die ("something went wrong");
					$numrowsadd2 = $queryadd2->rowCount();
					while($rowadd = $queryadd3->fetch(PDO::FETCH_ASSOC)) {
			
						$addid = $rowadd['id'];
		}//while
					$insert = $db->query("INSERT INTO friends_list VALUES('$addid','$addusername','$username')");
					
				}//else2
		}//else1
	}//if
?>
	


<?php include 'footer.php';?>