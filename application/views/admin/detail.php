<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<table id="" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Jamu</th>
				<th>Kemasan</th>
				<th>Stok</th>
				<th>Expired</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 0; ?>
			<?php foreach ($detail as $row): ?>
			<?php $no++; ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $row->nama_jamu; ?></td>
				<td><?= $row->kemasan; ?></td>
				<td><?= $row->stok; ?></td>
				<td><?= $row->expired; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>