<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style type="text/css">
.well {
	align-self: center;
	vertical-align: middle;
}
#form {
	font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
	font-size: 25px;
	width: 500px;
	align-self: center;
	vertical-align: middle;
	margin-top: 200px;
}
	#name{
		text-align: center;
	height: 20px;
	font-size: 12px;
		margin-left: 139px;
		width: 250px;
	}
#email {
	text-align: center;
	height: 20px;
	font-size: 12px;
	margin-left: 50px;
	width: 250px;
	margin-top: 5px;
}
#password {
	text-align: center;
		margin-top: 5px;
	height: 20px;
	font-size: 12px;
	margin-left: 47px;
	width: 250px;
}
	#confirmpassword{
		
	text-align: center;
	height: 20px;
			margin-top: 5px;
	font-size: 12px;
	margin-left: 8px;
	width: 250px;
	}
	#college{
		margin-left: 100px;
			margin-top: 5px;
	}
#register {
	align-self: center;
	font-size: 25px;
	margin: 15px 150px;
	width: auto;
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
	<?php require("header.php") ?>
<form method="post" action="" id="form">
  <div>
    <label for="name">Name: <span class="required">*</span> </label>
    <input type="text" id="name" name="name" value="" placeholder="Your name" required="required" autofocus />
  </div>
   <div>
    <label for="email">Email Address: <span class="required">*</span> </label>
    <input type="email" id="email" name="email" value="" placeholder="your@email.com" required="required" />
  </div>
  
  <div>
    <label for="password">New Password: <span class="required">*</span> </label>
    <input type="password" id="password" name="password" value="" placeholder="password" required="required" />
  </div>
  <div>
    <label for="password">Confirm Password: <span class="required">*</span> </label>
    <input type="password" id="confirmpassword" name="password" value="" placeholder="confirm password" required="required" />
  </div>
  <div>
    <label for="subject">College: *</label>
    <select id="college" name="college">
		<option>Select your college</option>
      <option value="Indian Institute of Technology, Delhi">Indian Institute of Technology, Delhi</option>
      <option value="Indian Institute of Technology, Guwahati">Indian Institute of Technology, Guwahati</option>
      <option value="Birla Institute of Technology and Science, Pilani">Birla Institute of Technology and Science, Pilani</option>
      <option value="National Institute of Technology, Jaipur">National Institute of Technology, Jaipur</option>
      <option value="Delhi Technological University, New Delhi">Delhi Technological University, New Delhi</option>
    </select>
  </div>
  <div>
    Gender: * 
    <label for="radio-choice-1">  Male</label>
    <input type="radio" name="radio-choice"  id="gender" tabindex="2" value="Male">
    <label for="radio-choice-2">Female</label>
    <input type="radio" name="radio-choice" tabindex="3" value="Female">
        <label for="radio-choice-2">Other</label>
    <input type="radio" name="radio-choice" tabindex="3" value="Other">
  </div>
  <div>
    <input type="submit" value="Register" id="register" class="button register"/>
  </div>
</form>
</body>
<footer><?php require("footer.php") ?></footer>
</html>
