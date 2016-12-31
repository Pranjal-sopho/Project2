<!--quote.php implementation-->
<?php
    // configure 
    require("../includes/config.php"); 
    //if the user clicks on quote we show him quote form
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("quote_form.php", ["title" => "Quote"]);
    }
    //In the quote form after entering the symbol he's directed to here because the method is post
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (lookup($_POST["symbol"]) === false)
        {
            apologize("You must provide a stock symbol.");
        }
        else{
            //store the symbol's data from yahoo
            $stock = lookup($_POST["symbol"]);
		    // render data for quote_display
            render("quote_display.php", ["title" => "Quote", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
    }
?>