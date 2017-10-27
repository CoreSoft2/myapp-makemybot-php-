<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {
		if (strcmp($_POST["formType"], "1") == 0) { 
			$_FIRSTNAME = input($_POST["firstname"]);
			$_LASTNAME = input($_POST["lastname"]);
			$_EMAIL = input($_POST["email"]);

			if (strlen($_FIRSTNAME) > 32) {
				show_error_page("settings", "incorrect length", "firstname must be less than or equal to 32 characters.");	
			}
			if (strlen($_LASTNAME) > 32) {
				show_error_page("settings", "incorrect length", "lastname must be less than or equal to 32 characters.");	
			}
			if (strlen($_EMAIL) > 128) {
				show_error_page("settings", "incorrect length", "e-mail must be less than or equal to 128 characters.");	
			}
			else if (filter_var($_EMAIL, FILTER_VALIDATE_EMAIL) === false)
			{
				show_error_page("settings", "invalid e-mail", "entered e-mail is incorrect.");
			}

			$count_data = query("SELECT * FROM user WHERE email = ?", ['s', $_EMAIL], 'n');
			
			if ($count_data >= 2) {
				show_error_page("settings", "invalid e-mail", "specified e-mail already exists.");
			}

			$update_data = query("UPDATE user SET firstname = ?, lastname = ?, email = ? WHERE id = ?", ["sssi", $_FIRSTNAME, $_LASTNAME, $_EMAIL, $_SESSION["id"]], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("settings", "database error", "error occured while updating data.");
			}

			$_SESSION["message"] = ['user settings successfully updated.'];
		} 
		if (strcmp($_POST["formType"], "2") == 0) { 
			$_OLDPASS = input($_POST["oldpass"]);
			$_NEWPASS = input($_POST["newpass"]);

			$user_item = query("SELECT * FROM user WHERE id = ?", ['i', $_SESSION["id"] ]);
			
			if (count($user_item) == 0) {
				show_error_page("settings", "database error", "error occured while fetching data.");
			} 

			if (password_verify($_OLDPASS, $user_item[0]["password"])) {
				$update_data = query("UPDATE user SET password = ? WHERE id = ?", ["si", password_hash($_NEWPASS, PASSWORD_BCRYPT), $_SESSION["id"]], 'a');
				
				if ($update_data != 1 && $update_data != 0) {
					show_error_page("settings", "database error", "error occured while updating data.");
				}
			} else {
				show_error_page("settings", "incorrect match", "old password didn't matched with current password.");
			}

			$_SESSION["message"] = ['password successfully changed.'];	
		} 
		if (strcmp($_POST["formType"], "3") == 0) { 
			
			$delete_data = query("DELETE FROM user WHERE id = ?", ["i", $_SESSION["id"]], 'a');
			
			if ($delete_data != 1 && $delete_data != 0) {
				show_error_page("settings", "database error", "error occured while deleting data.");
			}

			redirect("logout.php");
		} 
		
		redirect("setting_01.php");
    }
    else if (isset($_SESSION["id"]))
    {
		$context = generate_context('settings');
		$user_item = query("SELECT * FROM user WHERE id = ?", ['i', $_SESSION["id"] ]);
		
		if (count($user_item) == 0) {
			show_error_page("settings", "database error", "error occured while fetching data.");
		} 
		
		$context['userItem'] = $user_item;
		render("setting_01_view.php", $context);	
	} else {
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>