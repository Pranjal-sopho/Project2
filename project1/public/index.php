<?php
         if (file_exists("../views/form.php"))
        {
            require("../views/form.php");
            exit;
        }

        // else error
        else
        {
            trigger_error("Invalid view: form.php", E_USER_ERROR);
        }
?>