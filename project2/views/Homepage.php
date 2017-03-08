<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>homepage</title>
<style type="text/css">
#form {
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
	font-size: 25px;
	width: 500px;
	align-self: center;
	vertical-align: middle;
	margin-top: 200px;
}
#email {
	text-align: center;
	margin: auto 10px;
	height: 20px;
	font-size: 12px;
	width: 200px;
}
#password {
	text-align: center;
	margin: 10px 63px;
	height: 20px;
		width: 200px;
	font-size: 12px;
}
#sign_in {
	align-self: center;
	font-size: 25px;
	margin: auto 100px;
}
#register {
	align-self: center;
	font-size: 25px;
	margin: auto 85px;
	width: 100px;
}
	.store{
		width: 25%;
	background-color: white;
		align-self: center;
		margin: auto auto 50px 500px;
	color: black;
	border: 2px solid #008CBA;
	}
.button {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	cursor: pointer;
}
.signIn {
	background-color: white;
	color: black;
	border: 2px solid #008CBA;
}
.signIn:hover {
	background-color: #008CBA;
	color: white;
}
.register {
	background-color: white;
	color: black;
	border: 2px solid #008CBA;
}
.register:hover {
	background-color: #008CBA;
	color: white;
}
form {
	margin: auto;
	height: auto;
	width: auto;
}
form {
	position: relative;
	left: auto;
	top: auto;
	right: auto;
	bottom: auto;
}
</style>
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
        <label for="password">Password: <span class="required">*</span>
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
          <input class="button signIn" type="submit" value="Sign in" id="sign_in" />
        </p>
        <p style="margin-left: 140px">Or</p>
      </div>
      <div>
        <input class="button register" url="#" value="Register" id="register" />
      </div>
    </form>
  </blockquote>
  <div>
    <input class="button register store" url="#" value="Go to store" id="store" />
	</div>
</div>
</body>
	<footer>
		<?php require("footer.php") ?>
	</footer>
</html>