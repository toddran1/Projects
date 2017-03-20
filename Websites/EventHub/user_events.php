<?php include 'header.php'; ?>

<?php
	$queryevents = $db->query("SELECT * FROM eventcalendar WHERE id = '$id' Or f1='$firstname' OR f2='$firstname' OR f3='$firstname'");
	$numrowsevents = $queryevents->rowCount();
		
	if($numrowsevents ==0) 
		echo "No events Yet!";
	else {
		while($rowsevents = $queryevents->fetch(PDO::FETCH_ASSOC))
				echo "- $rowsevents[Title] on $rowsevents[eventDate]</br>";
	}//else		
?>


<?php include 'footer.php'; ?>