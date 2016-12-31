<?php
    require("../includes/config.php");
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("sell_form.php", ["tilte" => "Sell form"]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["symbol"])){
            apologize( "Please enter a symbol!"); 
        }
        else {
            $stock = lookup($_POST["symbol"]);
            $shares = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            if(!$stock){
                apologize("Invalid Symbol!");
            }
            else if(!$shares){
                apologize("You do not possess any shares of this company!");
            }
            else if($_POST["num_shares"] > $shares[0]["shares"]){
                apologize("You don't have that many shares of this company!");
            }
            else {
                //update shares
                CS50::query("UPDATE portfolios SET shares = shares - {$_POST["num_shares"]} WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
                //update cash               
                CS50::query("UPDATE users SET cash = cash + {$stock["price"]}*{$_POST["num_shares"]} WHERE id = ?",$_SESSION["id"]);
                //update history
                CS50::query("INSERT INTO history (id, user_id, transaction, symbol, shares) VALUES(NULL, ?, ?, ?, ?)", $_SESSION["id"], 'SELL', strtoupper($_POST["symbol"]), $_POST["num_shares"]);
                //show portfolio
                redirect("/");
            }
        }
    }

?>