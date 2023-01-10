<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h4>Laporan Penjualan Jamu</h4>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<table id="example3" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Tanggal Pembelian</th>
												<th>Nama Jamu</th>
												<th>Kemasan</th>
												<th>Jumlah Pembelian</th>
												<th>Harga</th>
												<th>Pendapatan</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; ?>
											<?php foreach ($data_laporan as $key): ?>
											<?php $no++; ?>
											<tr>
												<td><?= $no; ?></td>
												<td><?= $key->tgl_pembelian ?></td>
												<td><?= $key->nama_jamu ?></td>
												<td><?= $key->kemasan ?></td>
												<td><?= $key->jml_beli ?></td>
												<td>Rp. <?= $key->harga ?></td>
												<td>Rp. <?= $key->pendapatan ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
										<tbody>
											<?php foreach ($total_barang as $key): ?>
											<tr>
												<td colspan="4">Total</td>
												<td><?= $key->total_beli; ?></td>
												<td></td>
												<td>Rp. <?= $key->total_pendapatan; ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>