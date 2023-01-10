<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-10">
							<h4>Input Penjualan Jamu</h4>
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
							<?php if ($this->session->flashdata('pesan')): ?>
							<div class="col-md-12">
								<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
									<?php echo $this->session->flashdata('pesan'); ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
							<?php endif ?>
							<div class="card">
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ID Keluar</th>
												<th>Tanggal Input</th>
												<th>Nama Jamu</th>
												<th>Kemasan</th>
												<th>Jumlah Beli</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($barang_keluar as $key): ?>
											<tr>
												<td><?= $key->id_keluar ?></td>
												<td><?= $key->tanggal_keluar ?></td>
												<td><?= $key->nama_jamu ?></td>
												<td><?= $key->kemasan ?></td>
												<td><?= $key->jumlah_beli ?></td>
												<td>
													<a class="btn btn-sm btn-danger" data-toggle="modal"
														data-target="#konfirmasihapus" href="#!"
														onclick="deleteConfirm('<?= site_url('barangkeluar/delete/'.$key->id_keluar) ?>')"><i
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
							<h4 class="modal-title">Tambah jumlah</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?= form_open_multipart('Barangkeluar/add'); ?>
						<form action="" method="post">
							<div class="modal-body">
								<div class="row form-group">
									<div class="col col-md-3"><label for="idkeluar" class="form-control-label">ID
											Keluar</label></div>
									<div class="col-12 col-md-9">
										<input type="text" id="idkeluar" name="idkeluar" class="form-control"
											value="TK<?php echo sprintf("-%04s", $kode_keluar) ?>" readonly required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="tglinput" class="form-control-label">
											Tanggal Input</label></div>
									<div class="col-12 col-md-9">
										<input type="datetime-local" id="tglinput" name="tglinput" class="form-control"
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
												<?= $key->kemasan;?> : <?= $key->stok;?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col col-md-3"><label for="jumlah" class="form-control-label">
											Jumlah</label></div>
									<div class="col-12 col-md-9">
										<input type="number" value="<?= set_value('jumlah'); ?>" min="1" id="jumlah"
											name="jumlah" class="form-control" required>
									</div>
									<?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
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
		</div>

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