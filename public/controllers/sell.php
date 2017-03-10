<?php

    // if user wants to add something to his 'shop'
    if($_SERVER["REQUEST_METHOD"] == "GET")
        render("sell_form.php",["title" => "Sell"]);
        
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // checking if a field is empty
        if(empty($category) | empty($title) | empty($description) | empty($contact_info) | empty($price) | !isset($radio1) | !isset($radio2))
            apologize("Plese fill all the fields");
            
        else 
        {
            //validate submission (one more thing left to check)
            if(strlen($title) <4 | strlen($description) > 200 | strlen($contact_info) < 4 | !is_numeric($price))
                apologize("Please enter valid details and try again");
                
            else
            {
                // insert item in store
                $bool = query("INSERT INTO store (user_id,category,title,description,price,contact_info)");
                
                if(!$bool)
                    apologize("Item couldn't be added to store, please try again");
                    
                else
                {
                    // redirect to dashboard
                    redirect("index.php");
                }
            }
        
        }
    
    }
?>
