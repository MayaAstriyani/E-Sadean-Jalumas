<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-left">
					</ol>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<?php foreach($total_jenis as $data) : ?>
							<h3><?= $data->total_jenis; ?><sup style="font-size: 20px"></sup></h3>
							<?php endforeach; ?>
							<p>Jenis Barang</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="barang" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<?php foreach($total_stok as $data) : ?>
							<h3><?= $data->total_stok; ?><sup style="font-size: 20px"></sup></h3>
							<?php endforeach; ?>
							<p>Stok Barang</p>
						</div>
						<div class="icon">
							<i class="fas fa-box-open"></i>
						</div>
						<a href="barang" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				<div class="col-lg-3 col-6">
					<div class="small-box bg-primary">
						<div class="inner">
							<?php foreach($total_masuk as $data) : ?>
							<h3><?= $data->total_masuk; ?><sup style="font-size: 20px"></sup></h3>
							<?php endforeach; ?>
							<p>Barang Masuk</p>
						</div>
						<div class="icon">
							<i class="fas fa-exchange-alt"></i>
						</div>
						<a href="barangmasuk" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<?php foreach($total_keluar as $data) : ?>
							<h3><?= $data->total_keluar; ?><sup style="font-size: 20px"></sup></h3>
							<?php endforeach; ?>
							<p>Barang Keluar</p>
						</div>
						<div class="icon">
							<i class="fas fa-exchange-alt"></i>
						</div>
						<a href="barangkeluar" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<?php foreach($pendapatan as $data) : ?>
							<h3>Rp. <?= $data->total_pendapatan; ?><sup style="font-size: 20px"></sup></h3>
							<?php endforeach; ?>
							<p>Pendapatan</p>
						</div>
						<div class="icon">
							<i class="fas fa-chart-bar"></i>
						</div>
						<a href="laporan" class="small-box-footer">More info <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
		</div>
	</section>
</div>