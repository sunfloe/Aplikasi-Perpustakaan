<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<!-- Button trigger modal -->
<div class="col-lg-12 mb-3 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Tambah Daftar Peminjaman
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pilih Anggota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="table-sm">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Nomor Anggota</th>
                                    <th>alamat</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ; foreach ($anggotaa as $yy) {?>
                                <tr>
                                    <td><?= $yy['nama_anggota'] ?></td>
                                    <th><?= $yy['no_anggota'] ?></th>
                                    <td><?= $yy['alamat'] ?></td>
                                    <td><?= $yy['status'] ?></td>
                                    <td>
                                        <a
                                            href="<?=base_url('admin/peminjaman/add/'.$yy['anggota_id']);?>">
                                            <button type="button" class="btn btn-inverse-dark">
                                                pilih
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

</div>
<div class="col-lg-12 grid-margin stretch-card">
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
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Kembali</th>
							<th>Sudah/Belum Kembali</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($pinjam as $yy);{?>
							
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['no_anggota'] ?></td>
							<td><?= $yy['code_peminjaman']?></td>
							<td><?= $yy['tanggal_peminjaman']?></td>
							<td><?= $yy['tenggat']?></td>
							<td><?= $yy['status_pengembalian']?></td>
							<td>

							
							<?php if ($yy['status_pengembalian'] == 'belum') { ?>
									<a onclick="return confirm('konfirmasi pengembalian?')" href="<?=base_url('admin/peminjaman/kembalikan/'.$yy['peminjaman_id']);?>">
										<button type="button" class="btn btn-dark ">
											Konfirmasi Pengembalian
										</button>
									</a>
							<?php } ?>
								<a href="<?=base_url('admin/peminjaman/detail/'.$yy['code_peminjaman']);?>">
									<button type="button" class="btn btn-inverse-primary ">
										lihat detail
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
