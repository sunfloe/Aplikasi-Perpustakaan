<div class="card grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<section class="invoice">
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<div class="text-primary"><strong></strong></div>
						<address>
							<strong>Perpustakaan Matahari</strong><br>
							Jl. Yos sudarso,Kra <br>
							Phone : 085800127522 <br>
							Email : perpustakaan sunfloe @gmail.com
						</address>
					</div>
					<div class="col-sm-4 invoice-col">
						<div class="text-primary">
							<b>Code Peminjaman <b></br>
						</div>
						
						<b>#<?=$code_peminjaman?></b>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="card grid-margin strech-card mt-1">
	<div class="card card-light-blue">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>code buku</th>
							<th>Judul Buku</th>
							
		
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
							$total = 0;
							foreach ($detail as $oo) { ?>

						<tr>
							<td><?= $no ?></td>
							<td><?= $oo['kode_buku'] ?></td>
							<td><?= $oo['book_title'] ?></td>
							
                            
						</tr>
						<?php
							} ?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>
