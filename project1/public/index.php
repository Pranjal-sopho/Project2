<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
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
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["city_url"])){
            echo "Sorry, You have not submitted url of the city!";
        }
        else{
            $data = file_get_contents($_POST["city_url"]);
            while(preg_match('/<a class="institute-title-clr"(.+) title="(.+)"/i', $data, $matches)!==0) {
                echo "The name of the college is " . $matches[2];
                str_replace($matches[0], "", $data);
                str_replace($matches[1], "", $data);
                str_replace($matches[2], "", $data);
            }
        }
    }

?>