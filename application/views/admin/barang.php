<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-10">
							<h4>Data Jamu</h4>
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
										data-target="#tambahdata">
										<i class="fa fa-plus"></i> Tambah Data</button>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ID Jamu</th>
												<th>Nama Jamu</th>
												<th>Kemasan</th>
												<th>Harga</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($barang as $data): ?>
											<tr>
												<td><?= $data->kode_jamu; ?></td>
												<td><?= $data->nama_jamu; ?></td>
												<td><?= $data->kemasan; ?></td>
												<td>Rp. <?= $data->harga; ?></td>
												<td><?= $data->stok; ?></td>
												<td>
													<a class="btn btn-sm btn-info btn-view" data-toggle="modal"
														data-target="#detaildata<?= $data->kode_jamu; ?>" href=""><i
															class="fa fa-eye"></i></a>
													<a class="btn btn-sm btn-warning btn-edit" data-toggle="modal"
														data-target="#editdata<?= $data->kode_jamu; ?>"
														href="barang/proses_update"><i class="fa fa-edit"></i></a>
													<a class="btn btn-sm btn-danger" data-toggle="modal" data-target=""
														href="#!"
														onclick="deleteConfirm('<?= site_url('barang/delete/'.$data->kode_jamu) ?>')"><i
															class="fa fa-trash"></i></a>
												</td>
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

			<!-- modal tambah -->
			<div class="modal fade" id="tambahdata">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Data Jamu</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?= form_open_multipart('barang/add'); ?>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row form-group">
									<div class="col col-md-3"><label for="kodejamu" class="form-control-label">ID
											Jamu</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="kodejamu" name="kodejamu" class="form-control"
											value="JMU<?php echo sprintf("%03s", $kode_jamu) ?>" readonly required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="namajamu" class="form-control-label">
											Nama Jamu</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="namajamu" name="namajamu" class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="kemasan"
											class="form-control-label">Kemasan</label></div>
									<div class="col-12 col-md-9">
										<select class="form-control" id="kemasan" name="kemasan">
											<option value="pilih" selected disabled>Pilih</option>
											<option value="Sachet" <?php if (set_value('kemasan') == "Sachet") : echo "selected";
                                                        endif; ?>>Sachet</option>
											<option value="Pouch Rempah" <?php if (set_value('kemasan') == "Pouch Rempah") : echo "selected";
																	endif; ?>>Pouch Rempah</option>
											<option value="Pouch 100gr" <?php if (set_value('kemasan') == "Pouch 100gr") : echo "selected";
                                                        endif; ?>>Pouch 100gr</option>
											<option value="Pouch 200gr" <?php if (set_value('kemasan') == "Pouch 200gr") : echo "selected";
                                                        endif; ?>>Pouch 200gr</option>
											<option value="Botol" <?php if (set_value('kemasan') == "Botol") : echo "selected";
                                                        endif; ?>>Botol</option>
											<option value="Box" <?php if (set_value('kemasan') == "Box") : echo "selected";
														endif; ?>>Box</option>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="harga" class="form-control-label">
											Harga</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="harga" name="harga" class="form-control" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="stok" class="form-control-label">
											Stok</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="stok" name="stok" value="0" class="form-control" readonly
											required>
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

			<!-- modal view -->
			<?php foreach ($detail as $key): ?>
			<div class="modal fade" id="detaildata<?= $key->kode_jamu; ?>">
				<div class="modal-dialog modal-lg modal-dialog-scrollable">
					<div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">Detail Stok</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
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
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

			<!-- modal edit -->
			<?php foreach ($barang as $data_barang): ?>
			<div class="modal fade" id="editdata<?= $data_barang->kode_jamu; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Jamu</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<form action="barang/proses_update" method="post">
							<div class="modal-body">
								<div class="row form-group">
									<div class="col col-md-3"><label for="kodejamu" class="form-control-label">ID
											Jamu</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="kodejamu" name="kodejamu" class="form-control"
											value="<?= $data_barang->kode_jamu; ?>" readonly required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="namajamu" class="form-control-label">
											Nama Jamu</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="namajamu" name="namajamu" class="form-control"
											value="<?= $data_barang->nama_jamu; ?>" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="kemasan"
											class="form-control-label">Kemasan</label></div>
									<div class="col-12 col-md-9">
										<select class="form-control" id="kemasan" name="kemasan">
											<option value="" selected disabled><?= $data_barang->kemasan ?></option>
											<option value="Sachet" <?php if ($data_barang->kemasan == "Sachet") : echo "selected";
                                                        endif; ?>>Sachet</option>
											<option value="Pouch Rempah" <?php if ($data_barang->kemasan == "Pouch Rempah") : echo "selected";
																	endif; ?>>Pouch Rempah</option>
											<option value="Pouch 100gr" <?php if ($data_barang->kemasan == "Pouch 100gr") : echo "selected";
                                                        endif; ?>>Pouch 100gr</option>
											<option value="Pouch 200gr" <?php if ($data_barang->kemasan == "Pouch 200gr") : echo "selected";
                                                        endif; ?>>Pouch 200gr</option>
											<option value="Botol" <?php if ($data_barang->kemasan == "Botol") : echo "selected";
                                                        endif; ?>>Botol</option>
											<option value="Box" <?php if ($data_barang->kemasan == "Box") : echo "selected";
                                                        endif; ?>>Box</option>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="harga" class="form-control-label">
											Harga</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="harga" name="harga" class="form-control"
											value="<?= $data_barang->harga; ?>" required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="stok" class="form-control-label">
											Stok</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="stok" name="stok" class="form-control"
											value="<?= $data_barang->stok; ?>" readonly required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Edit</button>
								</div>

							</div>
						</form>
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