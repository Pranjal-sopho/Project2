<?php

    // configuration
    require("../includes/helpers.php");

    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("login_form.php",["title" => "Log In"]);
        
    // if user reaches page via post
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if a field is empty
        if(empty($_POST["email_id"]) || empty($_POST["password"]) )
            apologize("Please enter an email id and password");
      
        // validating email_id and password
        $string = sprintf("SELECT user_id,email_id,password FROM users WHERE email_id = \"%s\"",$_POST["email_id"]);
        $result = query($string);
        
        if($result == false)
            apologize("Invalid email_id or password!!");
            
        // check if entered password is the same as the stored one    
         if ($_POST["password"] === $result[0]["password"])
        {
            // remember that user is logged in by storing session id
            $_SESSION["id"] = $result[0]["user_id"];
            
            // logging in the user
            redirect("dashboard.php");
        }
        
        else
        {
            apologize("email id or password is incorrect!");
        }
    }
?>
