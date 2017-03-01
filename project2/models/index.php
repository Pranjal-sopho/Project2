<?php
         if (file_exists("../views/Homepage.php"))
        {
            require("../views/Homepage.php");
            exit;
        }

        // else error
        else
        {
            trigger_error("Invalid view: form.php", E_USER_ERROR);
        }
?>