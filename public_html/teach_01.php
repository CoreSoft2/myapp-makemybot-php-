<?php

    require("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["id"]))
    {
		if (!empty($_FILES['brainFile']['tmp_name'])) {
			$fullpath = sprintf('../media/brain/brain_%d.rive', $_SESSION["id"]);

			if(is_uploaded_file($_FILES['brainFile']['tmp_name'])) {
				if(!move_uploaded_file($_FILES['brainFile']['tmp_name'], $fullpath)) {
					show_error_page("teach", "upload error", "failed to move your image.");
				}
			}
			else {
				show_error_page("teach", "upload Error", "failed to upload your image.");
            }
            
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
		} else {
            show_error_page("teach", "upload error", "no brain detected in post data.");
        }
		
		$_SESSION["message"] = ['bot brain successfully uploaded.'];
		redirect("teach_00.php");
    }
    else if (isset($_SESSION["id"]))
    {
		$context = generate_context('teach');
		render("teach_01_view.php", $context);	
	} else {
		$context = generate_context('login');
		$_SESSION["message"] = ['you must be logged in first to access that page.'];

		render("login_view.php", $context);
	}
?>