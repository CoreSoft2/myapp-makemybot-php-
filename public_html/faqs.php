<?php


    require("../includes/config.php"); 
    
    $context = generate_context('faqs');
    render("faqs_view.php", $context);
 

?>
