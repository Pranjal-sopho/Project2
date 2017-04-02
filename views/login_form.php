<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>ColX-<?=$title?></title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
	  <header>
	<div class="wrapper">
		<a href="/"><img src="img/logo.png"/></a>
		<nav>
			<ul>
			    <li><a href="register.php">Register</a> </li>
				<li><a href="store.php">Go to store</a></li>
			</ul>
		</nav>
	</div>
</header>
    <div class="well container-fluid" id="form_div">
      <blockquote>
        <form method="post" action="login.php" id="form">
          <div style="margin-top:130px !important">
            <label for="email"><span class="required"></span> </label>
            <input type="email" id="email" name="email_id" placeholder="your@email.com" required="required" autofocus/>
          </div>
          <div>
            <label for="password"><span class="required"></span>&#160;&#160;&thinsp;
              <input type="password" id="password" name="password" value="" placeholder="your password" required="required" />
            </label>
          </div>
          <div>
            <p>
              <input class="button signIn" type="submit" value="Sign in" id="sign_in"/>
            </p>
          </div>
        </form>
      </blockquote>
    </div>
</body>
</html>