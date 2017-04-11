<?php
    
    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page after filling the sell form
    if($_SERVER["REQUEST_METHOD"] == "POST" )
    {
        // set target path
        $target_path = "img/uploads/";
        $target_path = $target_path . basename( $_FILES["my_file"]["name"]); 
        
        // get file extension
        $file_type = pathinfo($target_path,PATHINFO_EXTENSION);
            
        // Check if file already exists
        if (file_exists($target_path))
            apologize("file already exists.");
        
        // check if file is too large
        if( $_FILES["my_file"]["size"] > 100000)
            apologize("File size is greater than 50Kb");
        
        // Allow certain file formats only
        if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" ) 
            apologize("unsupported file type");
        
        if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_path))
        {
            
            // insert item in store
            $sql = sprintf("INSERT INTO store (user_id,category,title,description,price,seller_info,images,college,date) 
                   VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                   $_SESSION["id"],$_POST["category"],$_POST["title"],$_POST["description"],$_POST["price"],$_POST["contact_info"],
                   $target_path,$_POST["college"],date("d/m/Y"));
            
            $bool = query($sql);
                   
            if(!$bool)
                apologize("Item couldn't be added to store, please try again");
                        
            else
            {
                // redirect to dashboard
                redirect("/");
            } 
        }
        
        else
            apologize("Image couldn't be uploaded, please try again");
    }
?>
