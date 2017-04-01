<?php

<<<<<<< HEAD
// configuration
require( "../includes/helpers.php" );

// if user reaches page via a get request
if ( $_SERVER[ "REQUEST_METHOD" ] == "GET" ) {
	// extract user's items on sale from database
	$sale = query( "SELECT * FROM store WHERE user_id =\"" . $_SESSION[ "id" ] . "\"" );

	// render user's dashboard
	render( "dashboard_page.php", [ "title" => "Dashboard", "sale" => $sale ] );
}
?>
=======
    // configuration
    require("../includes/helpers.php");
    
    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
         // extract user's items on sale from database
        $sql = sprintf("SELECT * FROM store WHERE user_id = %s",$_SESSION["id"]);
        $sale = query($sql);
        
        if($sale === false)
            apologize("Could not fetch ur shop, Please try again");
        
        // render user's dashboard
        render("dashboard_page.php",["title" => "Dashboard","sale" => $sale]);
    }
?>
>>>>>>> 515c0dacb7eff79649f2ee5ecaaffccde20df02e
