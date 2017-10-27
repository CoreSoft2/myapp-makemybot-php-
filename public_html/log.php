<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {
			$_LOGTEXT = input($_POST["logText"]);

			$fullpath = sprintf('../media/chatlog/chatlog_%d.txt', $_SESSION["id"]);
			file_put_contents($fullpath, $_LOGTEXT);

			$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
			
			if (count($bot_item) == 0) {
				throw new Exception("error occured while fetching data.");
			} 
			
			if (strcmp($bot_item[0]["chatlog"], "../media/chatlog/chatlog_default.txt") == 0) {
				$update_data = query("UPDATE bot SET chatlog = ? WHERE user_id = ?", ["si", $fullpath, $_SESSION["id"]], 'a');
				if ($update_data != 1 && $update_data != 0) {
					throw new Exception("error occured while updating data.");
				}
			}
    } else {
		throw new Exception("You must be logged in first perform that action.");
	}
?>