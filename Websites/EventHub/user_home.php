<?php include 'header.php';?>

  <h3 style='margin-bottom:2px;display:inline;color:red'>Hello <?php echo $_SESSION['username']; ?> </h3> <br/>

	<!-- Page Content -->
    <div class="container">

        <div class="row">
            <center>
            	<h2>The Calendar</h2>
            </center>
        </div>
		<script>
			function goLastMonth(month, year)
			{
				if (month == 1)
				{
					--year;
					month = 13;
				}
				--month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if (monthlength <= 1)
				{
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
			
			function goNextMonth(month, year)
			{
				if (month == 12)
				{
					++year;
					month = 0;
				}
				++month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if (monthlength <= 1)
				{
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
		</script>
		

		<?php
			if (isset($_GET['day']))
			{
				$day = $_GET['day'];
			}
			else
			{
				$day = date("j");
			}
			
			if (isset($_GET['month']))
			{
				$month = $_GET['month'];
			}
			else
			{
				$month = date("n");
			}
			
			if (isset($_GET['year']))
			{
				$year = $_GET['year'];
			}
			else
			{
				$year = date("Y");
			}
			
			//calendar variable
			$currentTimeStamp = strtotime("$year-$month-$day");
			
			//getting current month name
			$monthName = date("F", $currentTimeStamp);
			
			//getting how many days there are in the current month
			$numDays = date("t", $currentTimeStamp);
			
			//variable to count cell in the loop
			$counter = 0;
			
			?>
			<?php
				if(isset($_GET['add']))
				{
					//$eventtitle;
					$title = $_POST['eventtitle'];
					$detail = $_POST['signmeup'];
					$eventdate = $month."/".$day."/".$year;
					$f1 = $_POST['eventfriend1'];
					$f2 = $_POST['eventfriend2'];
					$f3 = $_POST['eventfriend3'];
					
					//$sqlevent = $db->query("SELECT Title FROM eventcalendar WHERE eventDate='".$month."/".$day."/".$year."'");
					//$eventtitle = 'Title';
/*select/////*/		//	$resultevents = $sqlevent;
					//echo "<hr>";
					//$Events=$resultevents->fetch(PDO::FETCH_ASSOC);
					
					//$row = $sqlevent->rowCount();
					//$title = $row[0];
					//echo $row[0]; // 42
					
					//CREATING A RELATION BETWEEN THE USER AND THE EVENT
					//USER SIGNS UP FOR EVENT
					//$sqlinsert = "insert into eventcalendar (Title, Detail, eventDate, dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
					//ORIGINAL
/*insert*/			//$sqlinsert = $db->query("INSERT INTO eventcalendar (Title, Person, eventDate, dateAdded) VALUES ('".$title."','".$person."','".$eventdate."',now())");
					$sqlinsert = $db->query("INSERT INTO eventcalendar (ID,Title, Detail, eventDate, dateAdded, Person, f1, f2, f3) VALUES ('$id','".$title."','$detail','".$eventdate."',now(),'".$firstname."','$f1','$f2','$f3')") or die("Could not insert");

					$resultinsert = $sqlinsert;
					/*if ($resultinsert)
					{
						echo "You have successfully signed up.";	
					}
					else
					{
						echo "You have not successfully signed up.";
					}*/
					
					
				}
				
				
			?>
			
			
			<!-- CREATING THE CALENDAR -->
		<div class="calendar">
		<table border='1'>
			<tr>
				<td><input style='width:150px; height:50px' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year ?>)"></td>
				<td colspan='5' width='150px' height='50px' valign='middle'><center><h4><?php echo $monthName." ".$year; ?></h4></center></td>
				<td><input style='width:150px; height:50px' height:'50px' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year ?>)"></td>
				
			</tr>
			
			<tr>
				<td width='150px' height='50px'><center>Sunday</td></center>
				<td width='150px' height='50px'><center>Monday</td></center>
				<td width='150px' height='50px'><center>Tuesday</td></center>
				<td width='150px' height='50px'><center>Wednesday</td></center>
				<td width='150px' height='50px'><center>Thursday</td></center>
				<td width='150px' height='50px'><center>Friday</td></center>
				<td width='150px' height='50px'><center>Saturday</td></center>
			</tr>
			
			<?php
				echo "<tr width='150px' height='50px'>";
				
				for ($i = 1; $i < $numDays+1; $i++, $counter++)
				{
					$timeStamp = strtotime("$year-$month-$i");
					if ($i == 1)
					{
						$firstDay = date("w", $timeStamp);
						for ($j = 0; $j < $firstDay; $j++, $counter++)
						{
							//blank space
							echo "<td width='150px' height='50px'>&nbsp;</td>";
						}
					}
					if ($counter % 7 == 0)
					{
						echo "</tr><tr width='150px' height='50px'>";
					}
					$monthstring = $month;
					$monthlength = strlen($monthstring);
					$daystring = $i;
					$daylength = strlen($daystring);
					if ($monthlength <= 1)
					{
						$monthstring = "0".$monthstring;
					}
					if ($daylength <= 1)
					{
						$daystring = "0".$daystring;
					}
					$todaysDate = date("m/d/Y");
					$dateToCompare = $monthstring . '/' . $daystring . '/' . $year;
					echo "<td align='center' ";
					if($i == $day)
					{
						echo "style='font-weight:bold '";
					}
					if ($todaysDate == $dateToCompare)
					{
						echo "class='today'";
					}
					else
					{
						$sqlCount = $db->query("SELECT * FROM eventcalendar WHERE eventDate='".$dateToCompare."'");
						$noOfEvent = $sqlCount->rowCount();
						if ($noOfEvent >= 1)
						{
							echo "class='event'";
						}
					}
					echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}
				
				echo "</tr>";
			?>
		</table>
		</div>
		</center>
		
		<center>
		
		<?php
			if (isset($_GET['v']))
			{
				echo "<p><strong><big><a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a></big></strong></p>";
				
				if(isset($_GET['f']))
				{
					include("eventform.php");
					
				}
			}
			
			//PRINTING OUT EVENT NAME AND DETAIL AFTER USER SIGNS UP FOR AN EVENT
			//IF THE EVENT IS EMPTY, THEN A STATEMENT WILL BE PRINTED OUT 
			//SAYING THAT IT IS EMPTY
			$sqlEvent = $db->query("SELECT * FROM eventcalendar WHERE eventDate='".$month."/".$day."/".$year."'");
			$resultEvents = $sqlEvent;
			
			
			echo "<div class='eventname'>";
			$rowcount = $sqlEvent->rowCount();
			//$eventtitle = $row[1];
			if ($rowcount != NULL)
			{
				$row = $sqlEvent->fetch(PDO::FETCH_ASSOC);
				echo "<strong>Event Name: </strong>" .$row['Title']. "<br>";
				echo "<strong>Details: </strong>" .$row['Detail']. "<br>";
				echo "Invited: $row[f1], $row[f2], $row[f3]<br><br>";	

				echo "<strong>Note: </strong>The cream colored days are days with events.<br>";
				echo "The purple colored day is the current day.<br>";
				echo "The day you are currently viewing is bolded.";				
			}
			//echo "Title: " .$row[1]. "<br>";
			//echo "Detail: " .$row[2]. "<br>"; // 42
			//return $row[0];

			else 
			{
				
				echo "<br><strong>There are no events for this date.</strong><br><br>";
				
				echo "<strong>Note: </strong>The cream colored days are days with events.<br>";
				echo "The pink colored day is the current day.<br>";
				echo "The day you are currently viewing is bolded.";
			}
						
			echo "</div>";
			
		?>
		
		</center>
		
		
		
	<?php include 'footer.php';?>	