<?php 
   //require configuration
   require("../includes/config.php");
   
   //extract information from database for this user 
   $rows = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
   
   //first time when user clicks history
   if($_SERVER["REQUEST_METHOD"] == "GET")
   {
      render("history_form.php",["title" => "History", "positions" => $rows]);
   }
   //request method will always be get 
?>