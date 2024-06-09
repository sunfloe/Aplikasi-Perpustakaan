<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<div class="col-lg-12 mb-3">
	<a href="<?=base_url('admin/collection/add')?>"  class="btn btn-primary" >
		Tambah Buku 
	</a>
</div>
<!-- Modal -->

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Daftar Buku</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>Cover</th>
							<th>Kode Buku</th>
							<th>Judul Buku</th>
							<th>Category</th>
							<th>Penulis</th>
							<th>Penerbit</th>
							<th>Nomor Rak</th>
                            <th>ISBN</th>
                            <th>Tahun Terbit</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($collection as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td>
								<a href="<?= base_url('assets/upload/cover/'.$yy['cover'])?>" target="_blank">
									<i class='ti ti-search'>lihat foto</i>
								</a>
							</td>
							<td><?=$yy['kode_buku']?></td>
							<td><p><?= $yy['book_title'] ?></p>
							</td>
							<td><?= $yy['name_category'] ?><a href=""></a></td>
							<td><?= $yy['name']?></td>
							<td><?= $yy['name_penerbit'] ?></td>
							<td><?= $yy['nomor_rak'] ?></td>
							<td><?= $yy ['isbn']?></td>
							<td><?= $yy ['tahun']?></td>
							<td>
								<?php if($yy['status']=='tersedia') { ?>
									<label class="badge badge-success"><?= $yy ['status']?></label></td>
								<?php }elseif ($yy['status']=='dipinjam') {?>
									<label class="badge badge-warning"><?= $yy ['status']?></label></td>
								<?php } ?>

							
							<td>
								<a onclick="return confirm('are you sure?')"
									href="<?=base_url('admin/collection/delete/'.$yy['book_id']);?>">
									<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
										<i class="ti ti-trash btn-mb-3"></i>
									</button>
                                </a>
								<a href="<?=base_url('admin/collection/edit/'.$yy['book_id']);?>">
									<button type="button" class="btn btn-inverse-primary btn-fw btn-icon">
										<i class="ti ti-pencil btn-mb-3"></i>
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
