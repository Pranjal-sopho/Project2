<?php
  
    //starting session
    session.start();
     
    //configuration
    require();
    
    // if user reached page via a GET request
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render("Homepage.php", ["title" => "Form"]);
        
    else 
    {
        // query database for user's items on sale
        $sale = query("SELECT * FROM users WHERE user_id = ?",$_SESSION["id"]);
        
        // render user's dashboard
        render("sale.php",["title" => "Dashboard"]);
        
    }
?>
