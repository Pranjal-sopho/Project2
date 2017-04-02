<head>
		<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<header>
	<div class="wrapper">
		<a href="/"><img src="img/logo.png"/></a>
		<nav>
			<ul>
				<?php if(!isset($_SESSION["id"])):?>
				<li><a href="login.php">Log In</a> </li> 
				<?php else :?>
				<li><a href="logout.php">Log Out</a> </li> 
				<?php endif?>
				<li><a href="store.php">Go to store</a> </li>
			    <li><a href="dashboard.php">Dashboard</a> </li>
				<li><a href="sell.php">Sell</a></li>
			</ul>
		</nav>
	</div>
</header>