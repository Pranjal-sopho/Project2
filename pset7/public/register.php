<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["username"])){
            apologize("Username not filled");
        }else if(empty ($_POST["password"])){
            apologize("Password not filled"):
        }
        else if($_POST["password"] != $_POST["confirmation"]){
            apologize("your passwords don't match please try again");
        }
        
    }

?>