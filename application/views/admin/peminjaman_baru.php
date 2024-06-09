<div id="hilang">
	<?= $this->session->flashdata('alert') ?>
</div>

<div class="row">
	<div class="col-12 grid-margin stretch-card">
		<div class="card card-inverse-secondary">
			<div class="card-body">
				<h4 class="card-title">Code Peminjaman</h4>
				<form class="form-inline">
					<label class="sr-only"></label>
					<input type="text" class="form-control mb-2 mr-lg-12" id="inlineFormInputName2" name="code_peminjaman" value="<?=$code_peminjaman?>"
						readonly>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 grid-margin stretch-card mb-3">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<input type="hidden" name="anggota_id" id="anggota_id" value="<?= $anggota_id ?>">
				</div>
				<div class="form-group">
					<table class="table " id="tabelku" name="book_id">
						<thead>
							<tr>
								<th>Nama Buku</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($bukuku as $we) { ?>
							<tr>
								<td><?= $we['book_title']?> - <?= $we['kode_buku'] ?></td>
								<td>
									<form action="<?= base_url('admin/peminjaman/temp'); ?>" method="post"
										style="display: inline;">
										<input type="hidden" name="anggota_id" value="<?= $anggota_id ?>">
										<input type="hidden" name="book_id" value="<?= $we['book_id'] ?>">
										<input type="hidden" name="code_penjualan" value="">
										<button type="submit" class="btn btn-dark btn-fw btn-icon">
											<i class="ti ti-plus btn-mb-3"></i>
										</button>
									</form>
								</td>
							</tr>
							<?php }; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<!-- Button trigger modal -->
			<div class="card-body">
				<h4 class="card-title">List Buku</h4>
				<div class="table-responsive">
					<table class="table" id="tabelku">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Buku</th>
								<th>Deskripsi Buku</th>
								<th>ISBN</th>
								<th>Tahun Terbit</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($tempory as $yy) { ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $yy['kode_buku'] ?></td>
								<td>
									<p><b class="mb-3">Judul Buku = <?= $yy['book_title'] ?></b></p>
								</td>
								<td><?= $yy['isbn'] ?></td>
								<td><?= $yy['tahun'] ?></td>
								<td>
									<a onclick="return confirm('kamu yakin?')"
										href="<?= base_url('admin/peminjaman/delete/' . $yy['tempory_id']); ?>">
										<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
											<i class="ti ti-trash btn-mb-3"></i>
										</button>
									</a>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-body">
				<form action="<?= base_url('admin/peminjaman/pinjam') ?>" method="post">

					<input type="hidden" name="anggota_id" value="<?= $anggota_id; ?>">
					<button type="submit" class="btn btn-primary">Konfirmasi Peminjaman</button>
				</form>
			</div>
		</div>
	</div>
</div>
