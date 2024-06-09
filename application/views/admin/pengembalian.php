<div class="container">
    <h2 class="mt-3">Pengembalian Buku</h2>
    <div id="hilang">
        <?= $this->session->flashdata('alert'); ?>
    </div>
    <div class="card">
		<div class="card-body">
			<h4 class="card-title">Data Peminjaman</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>No Anggota</th>
							<th>Code Pinjam</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($peminjaman as $yy) { ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['no_anggota'] ?></td>
							<td><?= $yy['code_peminjaman'] ?></td>
							<td>
								<a onclick="return confirm('Konfirmasi pengembalian?')"
									href="<?= base_url('admin/pengembalian/kembalikan/'.$yy['peminjaman_id']); ?>">
									<button type="button" class="btn btn-dark">
										Kembalikan
									</button>
								</a>
								<a href="<?= base_url('admin/peminjaman/detail/'.$yy['code_peminjaman']); ?>">
									<button type="button" class="btn btn-warning">
										Lihat Detail
									</button>
								</a>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
