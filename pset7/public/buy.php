<?php
    //require configuration file
    require("../includes/config.php");
    //for the first time
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("buy_form.php", ["title" => "Buy Stocks"]);
    }
    //after entering the information
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        //if symbol is left empty
        if (empty($_POST["symbol"])){
            apologize("Please enter the Quote!");
        }
        //if number of shares left empty
        else if (empty($_POST["num_shares"])){
         apologize("Please enter the number of shares!");
        } 
        $stock = lookup($_POST["symbol"]);
        // validate symbol
        if ( !$stock ){
         apologize("Invalid symbol!");
        }
        $money = CS50::query("SELECT cash FROM users WHERE id = ?",$_SESSION["id"]);
      
        // validating shares and updating users table and portfolios table
        if ( $_POST["num_shares"]*$stock["price"] > $money[0]["cash"] ){
            apologize("You do not have enough money!");
        }
        else{
            CS50::query("UPDATE users SET cash = cash - {$_POST["num_shares"]}*{$stock["price"]} WHERE id = ?",$_SESSION["id"]);
         
            $shares = CS50::query("SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?",$_SESSION["id"], $_POST["symbol"]);
         
             if(!$shares){
                CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?)", $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["share"]);
            }
            else{
                CS50::query("UPDATE portfolios SET shares = shares + {$_POST["num_shares"]} WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
            }
            //log into history
            CS50::query("INSERT INTO history (id, user_id, transaction, symbol, shares) VALUES(NULL, ?, ?, ?, ?)", $_SESSION["id"], 'BUY', strtoupper($_POST["symbol"]), $_POST["num_shares"]);
            // redirect to portfolio
            redirect("/");
        }
     }
?>