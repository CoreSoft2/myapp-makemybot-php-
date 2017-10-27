<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {
		if (!empty($_FILES['avtaarFile']['tmp_name'])) {
			$extn = pathinfo($_FILES['avtaarFile']['name'], PATHINFO_EXTENSION);
			$path = sprintf('../media/avtaar/avtaar_%d', $_SESSION["id"]);
			$fullpath = $path.".".$extn;
			$files = glob($path.".*");
			foreach($files as $file) {
				unlink($file);
			}

			if(is_uploaded_file($_FILES['avtaarFile']['tmp_name'])) {
				if(!move_uploaded_file($_FILES['avtaarFile']['tmp_name'], $fullpath)) {
					show_error_page("settings", "upload error", "failed to move your image.");
				}
			}
			else {
				show_error_page("settings", "upload error", "failed to upload your image.");
			}

			$update_data = query("UPDATE bot SET avtaar = ? WHERE user_id = ?", ["si", $fullpath, $_SESSION["id"]], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("settings", "database error", "error occured while updating data.");
			}
		}

		if (isset($_POST["defaultFile"])) { 
			$update_data = query("UPDATE bot SET avtaar = DEFAULT WHERE user_id = ?", ["i", $_SESSION["id"]], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("settings", "database error", "error occured while updating data.");
			}
		} 

		$_NAME = input($_POST["name"]);
		$_DESCRIPTION = input($_POST["description"]);

		if (strlen($_NAME) > 32) {
            show_error_page("settings", "incorrect length", "name must be less than or equal to 32 characters.");	
		}
		if (strlen($_DESCRIPTION) > 512) {
            show_error_page("settings", "incorrect length", "description must be less than or equal to 512 characters.");	
		}

		if(isset($_POST["visible"])) {
			$_VISIBLE = 1;
		} else {
			$_VISIBLE = 0;
		}

		if(isset($_POST["greet"])) {
			$_GREET = 1;
			$_MESSAGE = input($_POST["message"]);
			if (strlen($_MESSAGE) > 32) {
				show_error_page("settings", "incorrect length", "message must be less than or equal to 32 characters.");	
			}
			$update_data = query("UPDATE bot SET name = ?, description = ?, visible = ?, greet = ?, message = ? WHERE user_id = ?", ["ssiisi", $_NAME, $_DESCRIPTION, $_VISIBLE, $_GREET, $_MESSAGE, $_SESSION["id"]], 'a');
		} else {
			$_GREET = 0;
			$update_data = query("UPDATE bot SET name = ?, description = ?, visible = ?, greet = ? WHERE user_id = ?", ["ssiii", $_NAME, $_DESCRIPTION, $_VISIBLE, $_GREET, $_SESSION["id"]], 'a');
		}

		if ($update_data != 1 && $update_data != 0) {
			show_error_page("settings", "database error", "error occured while updating data.");
		} 
		
		$_SESSION["message"] = ['bot settings successfully updated.'];
		redirect("setting_00.php");
		
    }
    else if (isset($_SESSION["id"]))
    {
		$context = generate_context('settings');
		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
		
		if (count($bot_item) == 0) {
			show_error_page("settings", "database error", "error occured while fetching data.");
		} 
		
		$context['botItem'] = $bot_item;
		render("setting_00_view.php", $context);	
	} else {
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>