<head>
    <title>ColX-<?=$title?></title>
    <link href="/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container-fluid">
<form method="post" action="sell.php" id="form">
  <div>
    <label>Title: <span class="required">*</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8201;&#8201;</label>
    <input type="text" id="name" name="title" placeholder="Title of the item" required="required" autofocus />
  </div>
  <div>
    <label>Description: <span class="required">*</span> &nbsp;&nbsp;</label>
    <input type="text" id="description" name="description" placeholder="Describe your item" required="required" />
  </div>
  <div>
    <label>Contact Info: <span class="required">*</span> &nbsp;&nbsp;</label>
    <input type="text" id="info" name="contact_info" placeholder="Contact information" required="required" />
  </div>
  <div>
    <label>Price: <span class="required">*</span> </label>
    <input type="number" id="price" name="price" placeholder="price" required="required" />
  </div>
  <div>
    <label for="subject">College:*</label>
    <select id="college" name="college">
      <option>Select your college</option>
      <option value="Indian Institute of Technology, Delhi">Indian Institute of Technology, Delhi</option>
      <option value="Indian Institute of Technology, Guwahati">Indian Institute of Technology, Guwahati</option>
      <option value="Birla Institute of Technology and Science, Pilani">Birla Institute of Technology and Science, Pilani</option>
      <option value="National Institute of Technology, Jaipur">National Institute of Technology, Jaipur</option>
      <option value="Delhi Technological University, New Delhi">Delhi Technological University, New Delhi</option>
    </select>
  </div>
    <label for="subject">Category:*</label>
    <select id="category" name="category">
      <option>Select category of your item</option>
      <option value="Books">Books</option>
      <option value="Clothing">Clothing</option>
      <option value="Electronics">Ele</option>
      <option value="Sports">Sports</option>
      <option value="Furniture">Furniture</option>
      <option value="Vehicle">Vehicle</option>
      <option value="Other">Others</option>
    </select>
  </div>
  <div>
    <input type="submit" value="Put for sale" id="sell" class="button register"/>
  </div>
</body>