<?php 
    if(empty($_GET["city_url"])){
            echo "Sorry, You have not submitted url of the city!";
        }
        else{
            $data = file_get_contents($_GET["city_url"]);
            preg_match_all('/<a class="institute-title-clr".+ title="(.+)"/', $data, $names);
            for($i=0; $i<35; $i++)
            echo $names[1][$i];
        }
?>