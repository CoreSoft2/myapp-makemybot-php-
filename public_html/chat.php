<?php


    require("../includes/config.php"); 
	
	if (isset($_SESSION["id"]))
    {	
		$context = generate_context('chat');
		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);

		if (count($bot_item) == 0) {
			show_error_page("chat", "database error", "error occured while fetching data.");
		} 
		
		$context['botItem'] = $bot_item;
		$context['chatPage'] = true;
		render("chat_view.php", $context);
	}
	else
	{
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>