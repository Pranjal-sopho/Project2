
<?php

/* store shows all the items put by users on sale 
on the website */

    // configuration
    require("../includes/helpers.php");

    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // GET ITEMS IN STORE
        $store = query("SELECT * FROM store");
        
        if($store === false)
            apologize("could not fetch store, please try again later");
        
        else
            render("store_result.php",["title" => "Store","store" => $store]);
    }
?>
