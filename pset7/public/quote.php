<!--quote.php implementation-->
<?php
    // configure 
    require("../includes/config.php"); 
    //after symbol is submitted through quote_form this follows
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        // lookup symbol
        $stock = lookup($_POST["symbol"]);
        // if invalid, ask for valid symbol
        if ($stock===false)
        {
            apologize("Please provide a valid symbol.");
        }
        else
        // turn symbol in capitals
        $stock["symbol"] = strtoupper($stock["symbol"]);
		// render data for quote_display
        {
            render("quote_display.php", ["title" => "Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
    }
    // display quote form and get input for the above condition
    else
    {
        render("quote_form.php", ["title" => "Quote"]);
    }
?>