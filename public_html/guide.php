<?php

    require("../includes/config.php"); 
    
    $context = generate_context('guide');
    render("guide_view.php", $context);
 
?>
