<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ColX-
		<?=$title?>
	</title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<header>
		<div class="wrapper">
			<a href="/"><img src="img/logo.png"/></a>
			<nav>
				<ul>
					<li><a href="index.php">Log In</a> </li>
					<li><a href="store.php">Go to store</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container-fluid">
		<form method="post" action="register.php" id="register_form">
			<div>
				<label for="name"><span class="required"></span></label>
				<input type="text" id="name" name="username" placeholder="Your name" required="required" autofocus/>
			</div>
			<div>
				<label for="email"><span class="required"></span></label>
				<input type="email" id="email" name="email_id" placeholder="your@email.com" required="required"/>
			</div>
			<div>
				<label for="password"><span class="required"></span></label>
				<input type="password" id="password" name="password" placeholder="password" required="required"/>
			</div>
			<div>
				<label for="password"><span class="required"></span> </label>
				<input type="password" id="confirmpassword" name="confirm_password" placeholder="confirm password" required="required"/>
			</div>
			<div>
				<label for="radio-choice-1"> Male</label>
				<input type="radio" name="radio-choice" id="gender" tabindex="2" value="Male">
				<label for="radio-choice-2">Female</label>
				<input type="radio" name="radio-choice" tabindex="3" value="Female">
				<label for="radio-choice-3">Other</label>
				<input type="radio" name="radio-choice" tabindex="4" value="Other">
			</div>
			<div>
				<label><span class="required"></span> </label>
				<input type="text" id="college" name="college" placeholder="college" required="required"/>
			</div>
			<div>
				<input type="submit" value="Register" id="register" class="button register"/>
			</div>
		</form>
	</div>
</body>

</html>