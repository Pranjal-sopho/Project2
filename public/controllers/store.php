<?php
/*
store shoes all the items available for sale
*/
    // if user reaches page via a get request
    if("REQUEST_METHOD" == "GET")
    {
        // GET ITEMS IN STORE
        $store = query("SELECT * FROM users WHERE user_id = \"".$_POST["id"]."\"");
        render("store.php",["title" => "Store","store" => $store]);
    }
?>
