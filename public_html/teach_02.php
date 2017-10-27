<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {

		if(isset($_POST["clearText"])) {
			$fullpath = sprintf('../media/chatlog/chatlog_%d.txt', $_SESSION["id"]);
			file_put_contents($fullpath, "");

			$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
			
			if (count($bot_item) == 0) {
				show_error_page("teach", "database error", "error occured while fetching data.");
			} 
			
			if (strcmp($bot_item[0]["chatlog"], "../media/chatlog/chatlog_default.txt") == 0) {
				$update_data = query("UPDATE bot SET chatlog = ? WHERE user_id = ?", ["si", $fullpath, $_SESSION["id"]], 'a');
				if ($update_data != 1 && $update_data != 0) {
					show_error_page("teach", "database error", "error occured while updating data.");
				}
			}
			
			$_SESSION["message"] = ['bot chatlog successfully cleared.'];
			redirect("teach_02.php");
		}

		if(isset($_POST["logText"])) {
			$_LOGTEXT = input($_POST["logText"]);

			$fullpath = sprintf('../media/chatlog/chatlog_%d.txt', $_SESSION["id"]);
			file_put_contents($fullpath, $_LOGTEXT);

			$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
			
			if (count($bot_item) == 0) {
				show_error_page("teach", "database error", "error occured while fetching data.");
			} 
			
			if (strcmp($bot_item[0]["chatlog"], "../media/chatlog/chatlog_default.txt") == 0) {
				$update_data = query("UPDATE bot SET chatlog = ? WHERE user_id = ?", ["si", $fullpath, $_SESSION["id"]], 'a');
				if ($update_data != 1 && $update_data != 0) {
					show_error_page("teach", "database error", "error occured while updating data.");
				}
			}
		}
    }
    else if (isset($_SESSION["id"]))
    {
		$context = generate_context('teach');
		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
		
		if (count($bot_item) == 0) {
			show_error_page("teach", "database error", "error occured while fetching data.");
		} 

		$log_text = file_get_contents($bot_item[0]["chatlog"]);
		
		$context['logText'] = $log_text;
		render("teach_02_view.php", $context);	
	} else {
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>