<?php

    // if user reaches page via a get request
    if($_SERVER["REQUEST_METHOD"] == "POST")
        render("sell_form.php");
?>
