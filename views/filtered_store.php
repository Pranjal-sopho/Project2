<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ColX-
		<?=$title?>
	</title>
</head>

<body>
	</br></br></br></br></br></br></br>
	<div class="tbl-header" id="store_table">
		<h2>Items available for sale in "<?=$_POST["category"]?>" category</h2>
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
				<?php foreach ($rows as $row): ?>
				<?php if($row["user_id"]!==$_SESSION["id"]) :?>
				<tr>
					<td align="center">
						<?= $row["title"] ?>
					</td>
					<td align="center"><img id="myImage" src=""/>
					</td>
					<td align="center">
						INR&thinsp;
						<?= number_format($row["price"], 2) ?>
					</td>
					<td align="center">
						<?=$row["college"]?>
					</td>
					<td align="center">
						<?= $row["category"]?>
					</td>
					<td align="center">
						<?=$row["date"]?>
					</td>
					<td align="center">
						<?= $row["seller_info"] ?>
					</td>
				</tr>
				<?php endif; ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>