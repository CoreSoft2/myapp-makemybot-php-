<?php
    require_once("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION["id"]))
    {
		$_USERNAME = input($_POST["username"]);
		$_PASSWORD = input($_POST["password"]);
		
		if (!(strlen($_USERNAME) > 4 and strlen($_USERNAME) < 32))
        {
            show_error_page("login", "incorrect length", "username must be between 4 to 32 characters.");	
        }
		if (!(strlen($_PASSWORD) > 4 and strlen($_PASSWORD) < 32))
        {
            show_error_page("login", "incorrect length", "password must be between 4 to 32 characters.");
        }
    
		$browse_data = query("SELECT * FROM user WHERE username = ?", ["s", $_USERNAME]);

		if (count($browse_data) > 0) {		
				foreach ($browse_data as $row_data) { 
					if (password_verify($_PASSWORD, $row_data["password"])) {
						if ($row_data["verified"] == 1) {
							$_SESSION["id"] = $row_data["id"];
							$_SESSION["email"] = $row_data["email"];
							$_SESSION["firstname"] = $row_data["firstname"];
							$_SESSION["lastname"] = $row_data["lastname"];
							$_SESSION["username"] = $row_data["username"]; 
							$_SESSION["message"] = ['you have been successfuly logged in.'];
							redirect("home.php");
						} else {
							show_error_page("login", "login error", "your account has not been verified.");
						}
					}
				}
				show_error_page("login", "login error", "either username or password is inccorect.");
		} else {
			show_error_page("login", "login error", "either username or password is inccorect.");
		}
			
	} else if (isset($_SESSION["id"])) {
		$_SESSION["message"] = ['you have already logged in.'];
		redirect("home.php");
	}  else if (isset($_GET['verify'])) {
		$verify = input($_GET['verify']);
		$browse_data = query("SELECT * FROM user WHERE verified = 0");
		$update_data = 0;

		foreach ($browse_data as $row_data) { 
			if (hash_equals($verify, hash_hmac('ripemd160', $row_data["email"], 'secret'))) {
				$update_data = query("UPDATE user SET verified = 1 WHERE id = ?", ["i", $row_data["id"]], 'a');	break;
			}
		}

		if ($update_data) {
			$_SESSION["message"] = ['your account has been verified successfully.'];
			redirect("login.php");
		} else {
			show_error_page("login", "verification error", "your account has been failed to verify.");
		}
		
	} else {
		$context = generate_context('login');
		render("login_view.php", $context);
	}
    
?>