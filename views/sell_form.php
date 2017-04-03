<head>
	<title>ColX-
		<?=$title?>
	</title>
	<link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container-fluid">
		<form method="post" action="upload.php" id="sell_form" enctype="multipart/form-data">
			<div>
				<label><span class="required"></span></label>
				<input type="text" id="name" name="title" placeholder="Title of the item" required="required" autofocus/>
			</div>
			<label for="subject"></label>
			<select id="category" name="category">
				<option>Select category of your item</option>
				<option value="Books">Books</option>
				<option value="Clothing">Clothing</option>
				<option value="Electronics">Electronics</option>
				<option value="Sports">Sports</option>
				<option value="Furniture">Furniture</option>
				<option value="Vehicle">Vehicle</option>
				<option value="Other">Others</option>
			</select>
			<div>
				<label><span class="required"></span> </label>
				<input type="number" id="price" name="price" placeholder="price(INR)" required="required"/>
			</div>
			<div>
				<label><span class="required"></span></label>
				<input type="text" id="description" name="description" placeholder="Describe your item" required="required"/>
			</div>
			<div>
				<label><span class="required"></span></label>
				<input type="text" id="info" name="contact_info" placeholder="Contact information" required="required"/>
			</div>
			</br>
			<div>
				<label>Image: <span class="required"></span></label>
				<input type="file" name="my_file" id="fileToUpload" required="required"></br>
				<input type="submit" value="Upload Image" name="submit">
			</div>

			<div>
				<label><span class="required"></span> </label>
				<input type="text" id="college" name="college" placeholder="college" required="required"/>
			</div>
			<div>
			</div>
			
	<div>
		<input type="submit" value="Put for sale" id="sell" class="button register"/>
	</div>
	</div>
</body>