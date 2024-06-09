<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<!-- Button trigger modal -->

<!-- Modal -->

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">

			<h4 class="card-title">Data Pengunjung hari ini</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>Nama</th>
							<th>Keperluan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($pengunjung as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['nama'] ?></td>
							<td><?= $yy['keperluan'] ?></td>
							
						</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
