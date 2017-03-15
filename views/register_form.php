<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?=$title?></title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<form method="post" action="register.php" id="form">
  <div>
    <label for="name">Name: <span class="required">*</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8201;&#8201;</label>
    <input type="text" id="name" name="username" placeholder="Your name" required="required" autofocus />
  </div>
  <div>
    <label for="email">Email Address: <span class="required">*</span> &nbsp;&nbsp;</label>
    <input type="email" id="email" name="email_id" placeholder="your@email.com" required="required" />
  </div>
  <div>
    <label for="password">New Password: <span class="required">*</span> &nbsp;&nbsp;</label>
    <input type="password" id="password" name="password" placeholder="password" required="required" />
  </div>
  <div>
    <label for="password">Confirm Password: <span class="required">*</span> </label>
    <input type="password" id="confirmpassword" name="confirm_password" placeholder="confirm password" required="required" />
  </div>
  <div>
    <label for="subject">&#8201;&#8201;&#8201;College:*</label>
    <select id="college" name="college">
      <option>Select your college</option>
      <option value="Indian Institute of Technology, Delhi">Indian Institute of Technology, Delhi</option>
      <option value="Indian Institute of Technology, Guwahati">Indian Institute of Technology, Guwahati</option>
      <option value="Birla Institute of Technology and Science, Pilani">Birla Institute of Technology and Science, Pilani</option>
      <option value="National Institute of Technology, Jaipur">National Institute of Technology, Jaipur</option>
      <option value="Delhi Technological University, New Delhi">Delhi Technological University, New Delhi</option>
    </select>
  </div>
  <div> Gender: *&nbsp;&nbsp;
    <label for="radio-choice-1"> Male</label>
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
</html>
