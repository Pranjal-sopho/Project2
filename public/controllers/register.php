<?php

    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page via get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("registration_page.php",["title" => "Registration"]);
    
    // if user reaches page via submitting a form    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if a field is empty
        if(empty($_POST["username"]) | empty($_POST["password"]) | empty($_POST["email_id"]) | empty($_POST["confirmation"]) | !isset($_POST["radio"]))
            apologize("Please fill all the fields");
    
        // check if password entered is correct
        if($_POST["password"] != $_POST["confirmation"])
            apologize("passwords do not match");
            
        else
        {
            // check if username is unique
            $row = query("SELECT username FROM users WHERE username = \"".$_POST["username"]."\"");
            
            if(empty($row))
            {
                // register new account in database
                $bool = query("INSERT INTO users (username,password,email_id,sex,) VALUES (\"".$_POST["username"]."\",\"".,$_POST["password"]."\",\"".$_POST["email_id"]."\")");
                
                if($bool === false)
                    apologize("Registration failed, Please try again");
                    
                // redirect user to login page
                redirect("login.php");
            }
        }
            
    }
?>
