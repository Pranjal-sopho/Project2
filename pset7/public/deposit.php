<?php
    // configuration
    require("../includes/config.php");
    
    // when user clicks on deposit show him deposit form
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("add_money_form.php", ["title" => "Deposit"]);
    }
    //user fills the form take data from him
     else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["cash"])){
            apologize("You have not provided amount of cash!");
        }
        else if(isset($_SESSION["id"])) {
            $cash = $_POST["cash"];
            CS50::query("UPDATE users SET cash = cash + $cash WHERE id = ?", $_SESSION["id"]);
            redirect("/");
        }
    }
?>