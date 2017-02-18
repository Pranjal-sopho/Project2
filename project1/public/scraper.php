<?php 
    if(empty($_GET["city_url"])){
            echo "Sorry, You have not submitted url of the city!";
        }
        else{
            $data = file_get_contents($_GET["city_url"]);
            //names of colleges
            preg_match_all('/<a class="institute-title-clr".+ title="(.+)"/', $data, $names);
            for($i=0; $i<30; $i++)
            echo $names[1][$i];
            
            //fees of colleges
            preg_match_all('/INR (\d+,\d+,\d+)/', $data, $fees);
            for($i=0; $i<30; $i++)
            echo $fees[1][$i];
            
            //courses offered
            preg_match_all('/<a href="http:\/\/www.shiksha.com\/.+\n.+(.+).+<\/a>/', $data, $course);
            for($i=1; $i<31; $i++)
            echo $course[0][$i];
        }
?>