<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
    <div class="well container-fluid">
      <blockquote>
        <form method="post" action="" id="form">
          <div>
            <label for="email">Email Address: <span class="required">*</span> </label>
            <input type="email" id="email" name="email" value="" placeholder="your@email.com" required="required" autofocus/>
          </div>
          <div>
            <label for="password">Password: <span class="required">*</span>&#160;&#160;
              <input type="password" id="password" name="password" value="" placeholder="your password" required="required" />
            </label>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Remember me </label>
              </div>
            </div>
          </div>
          <div>
            <p>
              <input class="button signIn" type="submit" value="Sign in" id="sign_in"/>
            </p>
            <p>Or</p>
          </div>
          <div> <a href="register.php">
            <input class="button register" value="Register" id="register"/>
            </a> </div>
        </form>
        <div><a href="store.php">
          <input class="button register store" value="Go to store" id="store"/>
          </a> </div>
      </blockquote>
    </div>
</body>
</html>