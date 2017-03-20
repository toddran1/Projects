<?php include 'header.php'; ?>

	<div class='chatroomContainer'>
		<div class='chatroomHeader'>
		<!--<h3> Place Holder Test!</h3> -->
				<h3>Welcome <strong><?php echo ($_SESSION['username']); ?> </strong></h3>
			
			</div>
			<div class='IMessages'>
				<script>
					$(document).ready(function(e){
						$.ajax({cache:false});
						setInterval(function(){ 
							($('.IMessages').load('talk.php'))
						},2000);
					});
				</script>
			</div>
			
			<div class='IMbottom'>
				<form action='#' onSubmit='return false;' id='chatForm'>
					<input type='hidden' name='names'id='name' value='<?php echo $_SESSION['username']; ?>'/>
					<input type='text' name='text' id='text' value='' placeholder= 'type messages here'/>
					<input type='submit' name='submit' value='Post' onclick=send() />
				</form>	
				</div>

				
<script type="text/javascript">

function send() {
	var sentmessage = (document.getElementById('text').value);
	document.getElementById('text').value = "";
	$.ajax({
     type: 'POST',
     url: 'talk.php',
     data:{'message': sentmessage},
     success:function(data)
     {
     	console.log("done");
     },
     error:function(data)
     {
     	console.log("nope");
     }
	});

}

</script>
				
		</div>


<?php include 'footer.php'; ?>