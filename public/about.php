<?php

    // configuration
    require("../includes/helpers.php");


    // if user reached page via a GET request
    if ( $_SERVER[ "REQUEST_METHOD" ] == "GET" )
    	render( "about.php", [ "title" => "About" ] );
?>