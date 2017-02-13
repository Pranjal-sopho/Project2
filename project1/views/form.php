<!DOCTYPE html>
<html>
    <head><title>data scraper</title></head>
    <body>
        <style>
            body{
                background-color:black;
            }
            #city_url{
            font-size: 30px;
            height: 50px; 
            width: 500px; 
            text-align: center;
            margin: 50px 450px auto;
            }
            #submit{
                height:50px; 
                width: 505px;
                margin: 30px 450px auto;
            }
            h1,h3{
                color: white;
                text-align: center;
            }
        </style>
        <h1>Data scraper</h1></br>
        <h3>Insert any url of shiksha.com below to see the details of colleges in that city!</h3>
    <form action="index.php" method="post" style="background-color: black;">
    
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="city_url" placeholder="City's URL" type="text" id="city_url"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit" id="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-triangle-top"></span>
                Submit</button>
            </div>
        
    </form>
    </body>
</html>