<?php

    /* this file contains all the necessary functions
    required for the website to work */
    
    // shows an apology message in case of an error
    function apologize($message)
    {
        render("apology.php",["message" => $message]);
    }
    
    // outputs a view
    function render($view,$arr = [])
    {
        // first checking if view exists, then render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables 
            extract($arr);

            // render view (between header and footer)
            if($view!="login_form.php"&&$view!="register_form.php")
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else trigger error
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    
    // redirects user to another webpage or file
    function redirect($address)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$address}");
        exit;
    }
    
    // query database for insertion, selection and deletion
    function query($query)
    {
        // attempting to connect to mysql server
        $link = mysqli_connect("127.0.0.1", "pranjal123321", "zrrJ8zNEdpuTwuty", "project2");
            
        if($link === false)
            return false;
            
        // checking if the query is one of insert, update or delete
        preg_match('/.*? /',$query,$match);
        
        // querying database
        $result = mysqli_query($link,$query);
        
        if($result === false )
            return false;
        
        // if query is select, fetch the resultant object and store in a array
        if($match[0] == "SELECT ")
        {
            $i=0;    
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                // iterating through each row and storing it in rows[]
                $rows[$i] = $row;
                $i++;
            }
            
            // freeing result set
            mysqli_free_result($result);
            
            // close connection and return the numeric array thus formed
            mysqli_close($link);
            return $rows;
        }
        
        // close connection
        mysqli_close($link);
        return true;
    }

?>
