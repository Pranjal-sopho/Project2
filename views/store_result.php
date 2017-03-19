<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ColX-<?=$title?></title>
</head>
<style>
.tbl-header{
  margin-top:100px;
  margin-left:auto;
  margin-right:auto;
  text-align:center;
}
#myImage
#pattern
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 12px;
	margin: 50px;
	width: 480px;
	text-align: center;
	margin-left:auto;
	margin-right:auto;
	border-collapse: collapse;
}
#pattern th
{
	font-size: 20px;
	font-weight: normal;
	padding: 10px;
	border-bottom: 1px solid #fff;
	color: #039;
}
#pattern td
{
	padding: 15px; 
	border-bottom: 1px solid #fff;
	color: #669;
	border-top: 1px solid transparent;
}
#pattern tbody tr:hover td
{
	color: #339;
	background: #fff;
}

</style>
<body>
  <!--for demo wrap-->
  
  <div class="tbl-header">
    <h2>Items available for sale</h2>
    <table id="pattern" summary="Meeting Results">
   <thead>
    	<tr>
        	<th scope="col">Item</th>
        	  <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">College</th>
            <th scope="col">Category</th>
            <th scope="col">date</th>
            <th scope="col">Seller</th>
        </tr>
  </thead>
    <tbody>
    	<?php foreach ($store as $item): ?>
        <tr>
            <td align="center"><?= $item["title"] ?></td>
            <td align="center"><img id="myImage" src=""/></td>
            <td align="center"><?= number_format($item["price"], 2) ?></td>
            <td align="center"><?=$item["college"]?></td>
            <td align="center"><?=$item["date"]?></td>
            <td align ="center"><?= $item["seller_info"] ?> </td>   
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
  </div>
</body>
</html>
