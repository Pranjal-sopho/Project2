<?php
    require("../includes/config.php");
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("sell_form.php", ["tilte" => "Sell form"]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["symbol"])){
            echo "Please enter a symbol!"; 
        }
        else {
            $stock = lookup($_POST["symbol"]);
            $shares = CS50::query("SELECT shares FROM portfolios WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            if(!$stock){
                echo "Invalid Symbol!";
            }
            else if(!$shares){
                echo "You do not possess any shares of this company!";
            }
            else if($_POST["num_shares"] > $shares[0]["shares"]){
                echo "You don't have that many shares of this company!";
            }
            else {
                CS50::query("UPDATE portfolios SET shares = shares - {$_POST["num_shares"]} WHERE user_id = ? AND symbol = ?", $_SESSION["id"], strtoupper($_POST["symbol"]));
                CS50::query("UPDATE users SET cash = cash + {$stock["price"]}*{$_POST["num_shares"]} WHERE id = ?",$_SESSION["id"]);
                redirect("/");
            }
        }
    }

?>