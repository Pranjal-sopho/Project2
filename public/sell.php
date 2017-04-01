<?php
    
    // configuration
    require("../includes/helpers.php");

    // if user wants to add something to his 'shop'
    if($_SERVER["REQUEST_METHOD"] == "GET" )
    {
        //check if user is logged in
        if(!empty($_SESSION["id"]))
             render("sell_form.php",["title" => "Sell"]);
             
        else
        apologize("You must login or register to sell an item".var_dump(($_SESSION["id"])));
    }
       
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // checking if a field is empty
        if(empty($title) | empty($description) | empty($contact_info) | empty($price) | !isset($college) | !isset($category) | !file_exists($_FILES['myfile']['tmp_name']) || !is_uploaded_file($_FILES['myfile']['tmp_name']))
            apologize("Plese fill all the fields");
            
        else 
        {
            // Get filesize
             $file_size = $_FILES['myfile']['size']; 
            
            //validate submission 
            if(strlen($title) <4 | strlen($description) > 200 | strlen($contact_info) < 4 | !is_numeric($price) | $file_size > 200*1000)
                apologize("Please enter valid details and try again");
                
            else
            {
                $target_path = "/home/jharvard/Project2/public/img/uploads";
                $target_path = $target_path . basename( $_FILES['myfile']['name']); 
                
                // move uploaded file to target path
                if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) 
                {
                    // Get Filename
                    $file_name = $_FILES['myfile']['name'];
                    
                    // generating file address
                    $file_address = "/home/jharvard/Project2/public/img/uploads/".$file_name;
                }
                
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
        
        }
    
    }
?>
