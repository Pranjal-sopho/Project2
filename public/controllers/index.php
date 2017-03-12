<?php

     //starting session
    session_start();

    // configuration
    require("../../includes/helpers.php");
    
    // if user reached page via a GET request
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render("Homepage.php", ["title" => "Home"]);
?>
