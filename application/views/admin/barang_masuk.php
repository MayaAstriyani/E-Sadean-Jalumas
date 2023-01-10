<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-10">
							<h4>Input Stok Jamu</h4>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="row mb-2">
								<div class="col-12 d-flex">
									<button type="button" class="btn btn-primary" data-toggle="modal"
										data-target="#tambahdata"><i class="fa fa-plus"></i> Tambah Data</button>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ID Masuk</th>
												<th>Tanggal Input</th>
												<th>Nama Jamu</th>
												<th>Kemasan</th>
												<th>Jumlah</th>
												<th>Tanggal Kadaluarsa</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($barang_masuk as $key): ?>
											<tr>
												<td><?= $key->id_masuk ?></td>
												<td><?= $key->tanggal_input ?></td>
												<td><?= $key->nama_jamu ?></td>
												<td><?= $key->kemasan ?></td>
												<td><?= $key->jumlah ?></td>
												<td><?= $key->expired ?></td>
												<td>
													<a class="btn btn-sm btn-warning" data-toggle="modal"
														data-target="#editdata<?= $key->id_masuk; ?>"
														href="barangmasuk/proses_update"><i class="fa fa-edit"></i></a>
													<a class="btn btn-sm btn-danger" data-toggle="modal" data-target=""
														href="#!"
														onclick="deleteConfirm('<?= site_url('barangmasuk/delete/'.$key->id_masuk) ?>')"><i
															class="fa fa-trash"></i></a>
												</td>
											</tr>			
											<!-- <?php
												if ($key->jumlah >= 0) {
													echo "<a href='barangmasuk/t_gagal' style='color:white;'>";
													echo "<button class='btn btn-danger col-md-12 mb-3'>";
													echo "<i class='fa fa-check'></i>";
													echo "Stok yang dimasukkan tidak boleh minus";
													echo "</button>";
													echo "</a>";
												} else {
													echo "<p class='btn btn-danger col-md-12'>pembelian melebihi batas stok</p>";
												}
											?> -->
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- modal tambah -->
			<div class="modal fade" id="tambahdata">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah jumlah</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?= form_open_multipart('BarangMasuk/add'); ?>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row form-group">
									<div class="col col-md-3"><label for="idmasuk" class="form-control-label">ID
											Masuk</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="idmasuk" name="idmasuk" class="form-control"
											value="TM<?php echo sprintf("-%04s", $kode_masuk) ?>" readonly required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="tglinput" class="form-control-label">
											Tanggal Input</label></div>
									<div class="col-12 col-md-9">
										<input type="date" id="tglinput" name="tglinput" class="form-control"
											required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="namajamu" class="form-control-label">
											Nama Jamu</label></div>
									<div class="col-12 col-md-9">
										<select class="form-control" id="namajamu" name="namajamu">
											<?php foreach ($barang as $key ):?>
											<option value="<?= $key->kode_jamu;?>"><?= $key->nama_jamu;?>
												(<?= $key->kemasan;?>)</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="jumlah" class="form-control-label">
											Jumlah</label></div>
									<div class="col-12 col-md-9">
										<input type="number" min="1" id="jumlah" name="jumlah" min="1" class="form-control"
											required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="expired" class="form-control-label">
											Tanggal Kadaluarsa</label></div>
									<div class="col-12 col-md-9">
										<input type="date" id="expired" name="expired" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
							<?= form_close(); ?>
						</form>
					</div>
				</div>
			</div>

			<!-- modal edit -->
			<?php foreach ($barangedit as $rows): ?>
			<div class="modal fade" id="editdata<?= $rows->id_masuk; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Jamu</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?= form_open_multipart('barangmasuk/proses_update'); ?>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row form-group">
									<div class="col col-md-3"><label for="idmasuk" class="form-control-label">ID
											Masuk</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="idmasuk" name="idmasuk" class="form-control"
											value="<?= $rows->id_masuk; ?>" readonly required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="tglinput" class="form-control-label">
											Tanggal Input</label></div>
									<div class="col-12 col-md-9">
										<input type="date" id="tglinput" name="tglinput" class="form-control"
											value="<?= $rows->tanggal; ?>" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="namajamu" class="form-control-label">
											Nama Jamu</label></div>
									<div class="col-12 col-md-9">
										<select class="form-control" id="namajamu" name="namajamu">
											<option value="<?= $rows->kode_jamu;?>"><?= $rows->nama_jamu;?>
												(<?= $rows->kemasan;?>)</option>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="jumlah" class="form-control-label">
											Jumlah</label></div>
									<div class="col-12 col-md-9">
										<input type="number" min="1" id="jumlah" min="1" name="jumlah" class="form-control"
											value="<?= $rows->jumlah; ?>" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="expired" class="form-control-label">
											Tanggal Kadaluarsa</label></div>
									<div class="col-12 col-md-9">
										<input type="date" id="expired" name="expired" class="form-control"
											value="<?= $rows->expired; ?>" required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Edit</button>
								</div>
							</div>
						</form>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; ?>

		<!-- modal hapus-->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
						<a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
</script>