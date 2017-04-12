<?php
    
    // configuration
    require("../includes/helpers.php"); 
    
     // if user reached page via a GET request
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = sprintf("SELECT * FROM store WHERE category = \"%s\"",strtolower($_POST["category"]));   
        $rows = query($sql);
        
        if(empty($rows))
            apologize("There are no results belonging to this category");
            
        else 
            render("filtered_store.php",["title" => "result"]);
    }
?>