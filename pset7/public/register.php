<?php

    // configuration
    require("../includes/config.php");

    //when the user initially reaches register.php i.e to see register_form
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("register_form.php", ["title" => "Register"]);
    }

    //when the user requests registration through entering info through form
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
        //insert the user in the databse and if can't then apologize
        else if(CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)) === false){
			apologize('Username already exists');
		}
		else{
			$rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
			$id = $rows[0]["id"];
			$_SESSION["id"] = $id; 
			redirect("index.php");
		}
    }

?>