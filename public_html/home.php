<?php

    require("../includes/config.php"); 
    
    $context = generate_context('home');
    render("home_view.php", $context);
 
?>
