<?php

    // configuration
    require("../includes/helpers.php");


    // if user reached page via a GET request
    if ( $_SERVER[ "REQUEST_METHOD" ] == "GET" )
    	if(isset($_SESSION["id"]))
    	redirect("dashboard.php");
    	else
    	render( "login_form.php", [ "title" => "Home" ] );
?>