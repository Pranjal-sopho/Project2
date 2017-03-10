<?php

    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render(login_page.php,["title" => "Log In"]);
        
    // if user reaches page via post
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if a field is empty
        if(empty($_POST["username"]) || empty($_POST["password"]) )
            apologize("Please enter a username and password");

        // preventing sql injection
        $_POST["username"] = htmlspecialchars($_POST["$username"]);
        $_POST["password"] = htmlspecialchars($_POST["$password"]);
        
        // validating username and password
        $result = query("SELECT * FROM users WHERE username = ?",$_POST["username"]);
        
        if($result == false)
            apologize("Invalid username or password!!");
            
        else if ($_POST["password"] == $result["password"])
        {
            // remember that user is logged in by storing session id
            $_SESSION["id"] = $result["user_id"];
            
            // logging in the user
            redirect("dashboard.php");
        }
    }
?>
