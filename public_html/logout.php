<?php

    require("../includes/config.php"); 
    logout();
    $_SESSION["message"] = ['you have successfully logged out.'];
    redirect("index.php");

?>
