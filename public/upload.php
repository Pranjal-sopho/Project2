<?php
    
    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page after filling the sell form
    if($_SERVER["REQUEST_METHOD"] == "GET" )
    {
        // set target path
        $target_path = "/home/jharvard/Project2/public/img/uploads";
        $target_path = $target_path . basename( $_FILES['my_file']['name']); 
        
        // get file extension
        $file_type = pathinfo($target_path,PATHINFO_EXTENSION);
        
        // check if uploaded file is actually an image or something else
        $check = imagecreatefromjpeg($_FILES["my_file"]["tmp_name"]);
        
        if($check === false)
            apologize("Invalid image type, please try again");
            
        // Check if file already exists
        if (file_exists($target_path))
        {
            apologize("Sorry, file already exists.");
            $status = false;
        }
        
        // check if file is too large
        if( $_FILES["my_file"]["size"] > 200000)
        {
            apologize("File size is greater than 200Kb");
            $status = false;
        }
        
        // Allow certain file formats only
        if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" ) 
        {
            apologize("Sorry, unsupported file type");
            $status = false;
        }
        
        if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_path))
        {
            // Get Filename
             $file_name = $_FILES['my_file']['name'];
                        
            // generating file address
            $file_address = "/home/jharvard/Project2/public/img/uploads/".$file_name;
            
            // insert item in store
            $sql = sprintf("INSERT INTO store (user_id,category,title,description,price,seller_info,images,college,date) 
                   VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                   $_SESSION["id"],$category,$title,$description,$price,$contact_info,$file_address,$college,date("d/m/Y"));
            $bool = query($sql);
                   
            if(!$bool)
                apologize("Item couldn't be added to store, please try again");
                        
            else
            {
                // redirect to dashboard
                redirect("dashboard.php");
            }
        }
        
        else
            apologize("Image coudn't be uploaded, please try again");
    }
?>
