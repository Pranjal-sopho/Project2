<?php

    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
         // extract user's items on sale from database
        $sql = sprintf("SELECT * FROM store WHERE user_id = %s",$_SESSION["id"]);
        $sale = query($sql);
        
        if($sale === false)
            apologize("You did not put anything on sale!");
       
        // render user's dashboard
        render("dashboard_page.php",["title" => "Dashboard","sale" => $sale]);
    }
?>

