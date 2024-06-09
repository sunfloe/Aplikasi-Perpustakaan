<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<!-- Button trigger modal -->
<div class="col-lg-12 mb-3 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Tambah Rak
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Rak</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('admin/rak/save')?>" method="post">

					<div class="form-group">
						<label for="exampleInputName1">Nomor Rak</label>
						<input type="text" class="form-control" placeholder="masukkan data dimana buku akan disimpan" name="nomor_rak" required>
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
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Data Penempatan Buku</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>Nomor Rak</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($rak as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['nomor_rak'] ?></td>
							<td>
								<a onclick="return confirm('are you sure?')"
									href="<?=base_url('admin/rak/delete/'.$yy['rak_id']);?>">
									<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
										<i class="ti ti-trash btn-mb-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $yy['rak_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $yy['rak_id'] ?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Penempatan Buku</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample" action="<?=site_url('admin/rak/update')?>"
													method="post">
													<input type="hidden" name="rak_id" value="<?=$yy['rak_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Nomor Rak</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$yy ['nomor_rak']?>" name="nomor_rak" required>
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
