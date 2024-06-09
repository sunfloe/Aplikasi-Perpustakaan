<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<!-- Button trigger modal -->
<div class="col-lg-12 mb-3 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anggotaModal">
		Tambah Anggota
	</button>
</div>

<div class="modal fade bd-example-modal-md" id="anggotaModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('admin/anggota/save')?>" method="post">

					<div class="form-group">
						<label for="exampleInputName1">Nama</label>
						<input type="text" class="form-control" placeholder="Name" name="nama_anggota">
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Nomor Anggota</label>
						<input type="text" class="form-control" placeholder="No Anggota" name="no_anggota" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Alamat</label>
						<input type="text" class="form-control" placeholder="alamat" name="alamat" required>
					</div>
					<div class="form-group">
						<label>status</label>
						<select class="form-control" name="status">
							<option value="pelajar">pelajar</option>
							<option value="mahasiswa">mahasiswa </option>
							<option value="umum">umum</option>
						</select>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Data User</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>Nomor Anggota</th>
							<th>alamat</th>
							<th>status</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($anggota as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['nama_anggota'] ?></td>
							<th><?= $yy['no_anggota'] ?></th>
							<td><?= $yy['alamat'] ?></td>
							<td><?= $yy['status'] ?></td>
							<td>
								<a onclick="return confirm('are you sure?')"
									href="<?=base_url('admin/anggota/delete/'.$yy['anggota_id']);?>">
									<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
										<i class="ti ti-trash btn-mb-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $yy['anggota_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $yy['anggota_id'] ?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample"
													action="<?=site_url('admin/anggota/update')?>" method="post">
													<input type="hidden" name="anggota_id"
														value="<?=$yy['anggota_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Nama</label>
														<input type="text" class="form-control" placeholder="Name"
															name="nama_anggota" value="<?=$yy['nama_anggota']?>">
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Nomor Anggota</label>
														<input type="text" class="form-control" placeholder="No Anggota"
															name="no_anggota" value="<?=$yy['no_anggota']?>">
													</div>
													<div class="form-group">
														<label for="exampleInputPassword4">Alamat</label>
														<input type="text" class="form-control" placeholder="alamat"
															name="alamat" value="<?=$yy['alamat']?>">
													</div>
													<div class="form-group">
														<label>status</label>
														<select class="form-control" name="status">
															<option value="pelajar">pelajar</option>
															<option value="mahasiswa">mahasiswa </option>
															<option value="umum">umum</option>
														</select>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
