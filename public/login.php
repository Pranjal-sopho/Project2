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

        // preventing sql injection
        $_POST["email_id"] = htmlspecialchars($_POST["$email_id"]);
        $_POST["password"] = htmlspecialchars($_POST["$password"]);
        
        // validating email_id and password
        $result = query("SELECT * FROM users WHERE email_id = \"".$_POST["email_id"]."\"");
        
        if($result === false)
            apologize("Invalid email_id or password!!");
            
        else if ($_POST["password"] == $result["password"])
        {
            // remember that user is logged in by storing session id
            $_SESSION["id"] = $result["user_id"];
            
            // logging in the user
            redirect("dashboard.php");
        }
    }
?>
