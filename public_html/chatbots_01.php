<?php


    require("../includes/config.php"); 
	
	if (isset($_GET['botId']) && is_numeric($_GET['botId']))
    {	
		$context = generate_context('chatbots');
		$bot_item = query("SELECT * FROM bot WHERE id = ? AND visible = 1", ['i', $_GET['botId'] ]);

		if (count($bot_item) == 0) {
			show_error_page("chatbots", "chatbot error", "specifed bot is not available for chat.");
		} else {
			$update_data = query("UPDATE bot SET views = views + 1 WHERE id = ?", ['i', $_GET['botId']], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("chatbots", "database Error", "error occured while updating data.");
			}
		}
		
		$context['botItem'] = $bot_item;
		$context['chatPage'] = true;
		render("chatbots_01_view.php", $context);
	}
	else
	{
		show_error_page("chatbots", "query error", "required query parameters are not found.");
	}
?>