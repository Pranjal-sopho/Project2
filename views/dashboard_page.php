<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ColX-
		<?=$title?>
	</title>
</head>

<body>
	<div class="tbl-header">
		<h2>Items put on sale by you</h2>
		<table align="center" id="pattern" summary="Meeting Results">
			<thead>
				<tr>
					<th scope="col">&emsp;Item&emsp;&emsp;</th>
					<th scope="col">&emsp;Image&emsp;&emsp;</th>
					<th scope="col">&emsp;Price&emsp;&emsp;</th>
					<th scope="col">&emsp;College&emsp;&emsp;</th>
					<th scope="col">&emsp;Category&emsp;&emsp;</th>
					<th scope="col">&emsp;Date&emsp;&emsp;</th>
					<th scope="col">&emsp;Seller&emsp;&emsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sale as $item): ?>
				<tr>
					<td align="center">
						<?= $item["title"] ?>
					</td>
					<td align="center"><img id="myImage" src=""/>
					</td>
					<td align="center">
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
				<?php endforeach ?>
			</tbody>
		</table>

</body>

</html>