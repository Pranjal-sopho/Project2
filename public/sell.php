<?php
    
    // configuration
    require("../includes/helpers.php");

    // if user wants to add something to his 'shop'
    if($_SERVER["REQUEST_METHOD"] == "GET" )
    {
        //check if user is logged in
        if(!empty($_SESSION["id"]))
             render("sell_form.php",["title" => "Sell"]);
             
        else
            apologize("You must login or register to sell an item");
    }
       

?>
