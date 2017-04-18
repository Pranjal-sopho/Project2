<?php

    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page via get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("register_form.php",["title" => "Registration"]);
    
    // if user reaches page via submitting a form    
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["username"]) | empty($_POST["password"]) | empty($_POST["email_id"]) | empty($_POST["confirm_password"]) | !isset($_POST["radio-choice"]))
              apologize("Please fill all the fields");

        else
        {
            // check if password entered is correct
            if($_POST["password"] != $_POST["confirm_password"])
                apologize("passwords do not match");
                
            else
            {
                // check if username is unique
                $sql = sprintf("SELECT username FROM users WHERE username = \"%s\"",$_POST["username"]);
                $row = query($sql);
                
                if(empty($row))
                {
                    // register new account in database
                    $sql = sprintf("INSERT INTO users (username,password,email_id,sex,college) VALUES('%s','%s','%s','%s','%s')",
                           $_POST["username"],$_POST["password"],$_POST["email_id"],$_POST["radio-choice"],$_POST["college"]);
                    
                    $bool = query($sql);
                    
                    if($bool === false)
                        apologize("Registration failed, Please try again");
                        
                    // redirect user to login page
                    redirect("login.php");
                }
                
                else
                    apologize("This username already exists, please try another one");
            }
        }
            
    }
?>
