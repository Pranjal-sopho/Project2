<?php
    // configuration
    require("../includes/config.php"); 
    // render portfolio
    $positions = [];
    
    $id = $_SESSION["id"];
    
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $id);
    
    foreach ($rows as $row)
    {
        $check = lookup($row["symbol"]);
        if ($check)
        {
            $positions[] = [
                "name" => $check["name"],
                "price" => $check["price"],
                "symbol" => $row["symbol"],
                "shares" => $row["shares"]
            ];
        }
    }
    $cur_row = CS50::query("SELECT * FROM users WHERE id = ?", $id);
    $cash = $cur_row[0]["cash"];
    render("portfolio.php", ["positions" => $positions, "cash" => $cash, "title" => "Portfolio"]);
?>