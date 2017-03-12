<?php

    // configuration
    require("../includes/helpers.php");
    
    //starting session
    session.start();
     
    //configuration
    require();
    
    // if user reached page via a GET request
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render("Homepage.php", ["title" => "Home"]);
?>
