<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ColX-
		<?=$title?>
	</title>
</head>

<body>
	<div class="wrapper">
		<form action="filter.php" method="post" id="filter_items">
			<nav>
				<ul id="filter">
					<li>
						<select name="category" id="category_filter">
							<option>Category filter</option>
							<option value="Books">Books</option>
							<option value="Clothing">Clothing</option>
							<option value="Electronics">Electronics</option>
							<option value="Sports">Sports</option>
							<option value="Furniture">Furniture</option>
							<option value="Vehicle">Vehicle</option>
							<option value="Other">Others</option>
						</select>
						<input type="submit" value="Filter" id="sell" class="button register"/>
					</li>
				</ul>
			</nav>
		</form>
	</div>

	<div class="tbl-header" id="store_table">
		<h2>Items available for sale</h2>
		<table align="center">
			<thead>
				<tr>
					<th scope="col">&emsp;Item&emsp;&emsp;</th>
					<th scope="col">&emsp;Image&emsp;&emsp;</th>
					<th scope="col">&emsp;Price&emsp;&emsp;</th>
					<th scope="col">&emsp;College&emsp;&emsp;</th>
					<th scope="col">&emsp;Category&emsp;&emsp;</th>
					<th scope="col">&emsp;Date&emsp;&emsp;</th>
					<th scope="col">&emsp;Seller Info&emsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($store as $item): ?>
				<?php if($item["user_id"]!==$_SESSION["id"]) :?>
				<tr>
					<td align="center">
						<?= $item["title"] ?>
					</td>
					<td align="center"><img id="myImage" src=""/>
					</td>
					<td align="center">
						INR&thinsp;
						<?= number_format($item["price"], 2) ?>
					</td>
					<td align="center">
						<?=$item["college"]?>
					</td>
					<td align="center">
						<?= $item["category"]?>
					</td>
					<td align="center">
						<?=$item["date"]?>
					</td>
					<td align="center">
						<?= $item["seller_info"] ?>
					</td>
				</tr>
				<?php endif; ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>