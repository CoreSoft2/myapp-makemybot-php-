<?php

    require_once("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$_EMAIL = "kaushal.meena1996@gmail.com";
		$_HEADERS = "From: USER <".input($_POST["email"]).">";
		$_SUBJECT = input($_POST["subject"]);
		$_MESSAGE = input($_POST["message"]);
		
		if (empty($_EMAIL))
        {
            show_error_page("contact", "empty e-mail", "e-mail can't be left empty.");
        }
		else if (filter_var($_EMAIL, FILTER_VALIDATE_EMAIL) === false)
        {
            show_error_page("contact", "invalid e-mail", "please enter a valid e-mail.");
        }
		if (empty($_SUBJECT))
        {
            show_error_page("contact", "empty subject", "subject can't be left empty.");
        }
		if (empty($_MESSAGE))
        {
            show_error_page("contact", "empty message", "message can't be left empty.");
        }

        if (@mail($_EMAIL, $_SUBJECT, $_MESSAGE, $_HEADERS)) {
            $_SESSION["message"] = ['mail has been sent successfuly.']; 
            redirect("home.php");
        } else {
           show_error_page("contact", "mail error", "error occured while sending mail.");
        }
	}
	else {
		$context = generate_context('contact');
		render("contact_view.php", $context);
	}
	
?>
