<style>

.signup {
    	height: 190px;
    	width: 45%;
    	padding: 20px;
    	border-radius: 25px;
    	background-color: #0000ff;
    	/*background:rgba(255,243,219,0.8);*/
    	background: #c9b0c6;
}

.btn btn-danger {
    	color:#fff;
    	background-color:#c9b0c6;
    	border-color:#ac2925;
    }

</style>

<div class='signup'>
<form name='eventform' method='POST' action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
	<table width='400px'>
		<tr>
			<td width = '175px' style="font-weight: bold;"><big>Event title: </big></td>
			<td width = '200px'><input type='text' name='eventtitle'></td>
		</tr><tr>
			<td style="font-weight: bold;"><big>Event details: </big></td>
			<td width = '200px'><input type='text' name='signmeup'></td>
		</tr><tr>
			<td valign = "top" style="font-weight: bold;"><big>Who is invited: </big></td>
			<td><input type='text' name='eventfriend1'>
				<input type='text' name='eventfriend2'>
				<input type='text' name='eventfriend3'>
			</td>
		</tr><tr>
	</table>
	<table width='300px'>
		<tr>
			<td align='center'><input type='submit' name='btnadd' class='btn btn-danger' value='Submit'></td>
		</tr>
	</table>
</form>
</div>

<br>