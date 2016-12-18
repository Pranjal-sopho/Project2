<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["username"])){
            apologize("Username not filled");
        }
        else if(empty($_POST["password"])){
            apologize("Password not filled");
        }
        else if($_POST["password"] != $_POST["confirmation"]){
            apologize("your passwords don't match please try again");
        }
        else if(query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"])) === false){
			apologize('Username already exists');
		}
		else{
			// insert the new user into the database
			$rows = query("SELECT LAST_INSERT_ID() AS id");
			$id = $rows[0]["id"];
			$_SESSION["id"] = $id; 
			redirect("index.php");
		}
    }

?>