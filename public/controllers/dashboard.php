<?php

    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
         // extract user's items on sale from database
        $sale = query("SELECT * FROM users WHERE user_id = ?",$_SESSION["id"]);
        
        // render user's dashboard
        render("dashboard_page.php",["title" => "Dashboard","sale" => $sale]);
    }
?>
