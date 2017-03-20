<?php
include 'db.php';

	$result = $db->query("SELECT * FROM chat_mess ORDER BY `time` ASC");
	while ($extract = $result->fetch() ) {
		echo $extract['USER_NAME'] . ":   " . $extract['MESSAGES']. "<br>"; 

	}//while

?>