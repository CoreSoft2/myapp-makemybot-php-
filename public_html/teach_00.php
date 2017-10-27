<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {
		$_BRAINTEXT = input($_POST["brainText"]);
		
		$fullpath = sprintf('../media/brain/brain_%d.rive', $_SESSION["id"]);
		file_put_contents($fullpath, html_entity_decode($_BRAINTEXT));

		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
		
		if (count($bot_item) == 0) {
			show_error_page("teach", "database error", "error occured while fetching data.");
		} 
		
		if (strcmp($bot_item[0]["brain"], "../media/brain/brain_default.rive") == 0) {
			$update_data = query("UPDATE bot SET brain = ? WHERE user_id = ?", ["si", $fullpath, $_SESSION["id"]], 'a');
			if ($update_data != 1 && $update_data != 0) {
				show_error_page("teach", "database error", "error occured while updating data.");
			}
		}
		
		$_SESSION["message"] = ['bot brain successfully updated.'];
		redirect("teach_00.php");
    }
    else if (isset($_SESSION["id"]))
    {
		$context = generate_context('teach');
		$bot_item = query("SELECT * FROM bot WHERE user_id = ?", ['i', $_SESSION["id"] ]);
		
		if (count($bot_item) == 0) {
			show_error_page("teach", "database error", "error occured while fetching data.");
		} 

		$brain_text = file_get_contents($bot_item[0]["brain"]);
		
		$context['brainText'] = $brain_text;
		render("teach_00_view.php", $context);	
	} else {
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>