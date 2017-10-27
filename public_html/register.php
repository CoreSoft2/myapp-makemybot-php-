<?php

    require_once("../includes/config.php"); 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION["id"]))
    {
        $_FIRSTNAME = input($_POST["firstname"]);
        $_LASTNAME = input($_POST["lastname"]);
        $_EMAIL = input($_POST["email"]);
        $_USERNAME = input($_POST["username"]);
		$_PASSWORD = input($_POST["password"]);
        $_CONFIRM = input($_POST["confirm"]);

        if (strlen($_FIRSTNAME) > 32) {
            show_error_page("register", "incorrect length", "firstname must be less than or equal to 32 characters.");	
        }
        if (strlen($_LASTNAME) > 32) {
            show_error_page("register", "incorrect length", "lastname must be less than or equal to 32 characters.");	
        }
        if (strlen($_EMAIL) > 128) {
            show_error_page("register", "incorrect length", "e-mail must be less than or equal to 128 characters.");	
        }
        else if (filter_var($_EMAIL, FILTER_VALIDATE_EMAIL) === false)
        {
            show_error_page("register", "Invalid e-mail", "entered e-mail is incorrect.");
        }
		if (!(strlen($_USERNAME) > 4 and strlen($_USERNAME) < 32)) {
            show_error_page("register", "incorrect length", "username must be between 4 to 32 characters.");	
        }
		if (!(strlen($_PASSWORD) > 4 and strlen($_PASSWORD) < 32)) {
            show_error_page("register", "incorrect length", "password must be between 4 to 32 characters.");
        }
        else if (!($_PASSWORD == $_CONFIRM)) {
            show_error_page("register", "incorrect match", "password didn't matched with confirm.");
        }
        
        $count_data = query("SELECT * FROM user WHERE email = ?", ['s', $_EMAIL], 'n');
        
        if ($count_data >= 1) {
            show_error_page("register", "invalid e-mail", "specified e-mail already exists.");
        }
        
		$user_id = query("INSERT INTO user (username, password, email, firstname, lastname, created) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)", ["sssss", $_USERNAME, password_hash($_PASSWORD, PASSWORD_BCRYPT), $_EMAIL, $_FIRSTNAME, $_LASTNAME], 'i');
			
        if ($user_id) {
            $verify = hash_hmac('ripemd160', $_EMAIL, 'secret');

            $subject = 'Verify your account';
            $headers = "From: ADMIN <kaushal.meena1996@gmail.com>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
            $message = '<html><body>';
            $message .= '<h1 align="center">Hello, '.$_FIRSTNAME.'!</h1>';
            $message .= '<h3 align="center">Please click the link bellow to verify your email address: </h3>';
            $message .= '<h4 align="center"><a href="http://localhost/myapp-makemybot/public_html/login.php?verify='.$verify.'">Verify</a></h4>';
            $message .= '</body></html>';

            if (@mail($_EMAIL, $subject, $message, $headers)) {
                $_SESSION["message"] = ['verification link has been sent to your mail.']; 
                redirect("home.php");
            } else {
                show_error_page("register", "mail error", "error occured while sending mail.");
            }
        } else {
            show_error_page("register", "database error", "error occured while inserting data.");
        }
    } else if (isset($_SESSION["id"])) {
        $_SESSION["message"] = ['you have already registered.'];
        redirect("home.php");
    } else {
        $context = generate_context('register');
        render("register_view.php", $context);
	}
    
?>