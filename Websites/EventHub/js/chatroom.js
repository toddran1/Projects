$(function()
{
	$(document).on('submit','#chatForm',function()
	{
		var text = $.trim($("#text").val());
		var USER_NAME = $.trim($("#USER_NAME").val());
		
			if(text != ""&& USER_NAME != "")
			{
				$.post('chatroom.php', {text: text, USER_NAME: USER_NAME}),function(data)
				{	
					$(".IMessages").append(data);

				});
			}	
			else
			{
				alert("Missing Information !");
			}
	});
			
});
