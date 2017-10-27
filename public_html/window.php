<?php


    require("../includes/config.php"); 
	
	if (isset($_GET['botId']) && is_numeric($_GET['botId']))
    {	
		$context = generate_context('chat');
		$bot_item = query("SELECT * FROM bot WHERE id = ? AND visible = 1", ['i', $_GET['botId'] ]);


		if (count($bot_item) == 0) {
			show_error_page("chat", "chatbot error", "specifed bot is not available for chat.");
		} else {

            if ($bot_item[0]["visible"] == 0) {
                show_error_page("chat", "bot error", "specified bot is not available for viewing.");
            }

			$update_data = query("UPDATE bot SET views = views + 1 WHERE id = ?", ['i', $_GET['botId']], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("chat", "database error", "error occured while updating data.");
			}
		}
		
		$context['botItem'] = $bot_item;
        $context['chatPage'] = true;
        
        extract($context);
        require_once("../views/window_view.php"); 
	}
	else
	{
		show_error_page("chat", "query error", "required query parameters are not found.");
	}
?>