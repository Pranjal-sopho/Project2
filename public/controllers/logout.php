<?php

    // if user reached page via a GET request
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
         // resetting all session variables
        $_SESSION = [];

        // expire cookies
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
        
        // redirect user to homepage
        redirect("/");
    }
?>
