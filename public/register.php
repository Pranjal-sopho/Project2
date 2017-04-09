<?php

    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page via get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("register_form.php",["title" => "Registration"]);
    
    // if user reaches page via submitting a form    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        // check if password entered is correct
        if($_POST["password"] != $_POST["confirm_password"])
            apologize("passwords do not match");
            
        else
        {
            // check if username is unique
            $row = query("SELECT username FROM users WHERE username = \"".$_POST["username"]."\"");
            
            if(empty($row))
            {
                // register new account in database
                $query="INSERT INTO users (username,password,email_id,sex,college) VALUES (\"".$_POST["username"]."\", \"".$_POST["password"]."\", \"".$_POST["email_id"]."\",\"".$_POST["radio-choice"]."\", \"".$_POST["college"]."\")";
                $bool = query($query);
                
                if($bool === false)
                    apologize("Registration failed, Please try again");
                    
                // redirect user to login page
                redirect("login.php");
            }
        }
            
    }
?>
