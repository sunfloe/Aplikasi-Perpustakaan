

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card card-inverse-dark">
			<div class="card-body">
			<h5>Halo <?= $this->session->userdata('name');?>!</h5>
			</div>
		</div>
	</div>
</div>

<div class="row">
<div class="col-md-6 grid-margin stretch-card">
		<div class="card card-inverse-primary">
			<div class="card-body">
				<div class="chartjs-size-monitor">
					<div class="chartjs-size-monitor-expand">
						<div class=""></div>
					</div>
					<div class="chartjs-size-monitor-shrink">
						<div class=""></div>
					</div>
				</div>
				<p class="card-title">Jumlah Kunjungan</p>
				<p class="font-weight-500">Lima Bulan Terakhir</p>

				<canvas id="myChart" width="100" height="100"></canvas>

				<script>
					// Sample data for a bar chart
					var data = {
						labels: ['<?= $lima ?>', '<?= $empat ?>', '<?= $tiga ?>', '<?= $dua ?>', '<?= $satu ?>', '<?= $now ?>'],
						datasets: [{
							label: 'Monthly Sales',
							data: [<?= $month5 ?>, <?= $month4 ?>, <?= $month3 ?>, <?= $month2 ?>, <?= $month1 ?>, <?= $month ?>],
							backgroundColor: 'rgba(249, 255, 187, 0.5)',

							borderWidth: 1
						}]
					};

					// Configuration options
					var options = {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					};

					// Get the canvas element
					var ctx = document.getElementById('myChart').getContext('2d');

					// Create a bar chart
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: data,
						options: options
					});
				</script>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin transparent col-mt-6">
		<div class="row">
			<div class="col-md-6 mb-4 stretch-card transparent">
				<div class="card card-tale">
					<div class="card-body">
						<p class=" mb-3">Peminjaman  Hari ini</p>
						<p class="fs-30 mb-2"><?= $today ?></p>

					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4 stretch-card transparent">
				<div class="card card-dark-blue">
					<div class="card-body">
						<p class="mb-3">Kunjungan Hari Ini</p>
						<p class="fs-30 mb-2"><?=$kunjungan ?></p>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
				<div class="card card-light-blue">
					<div class="card-body">
						<p class="mb-4">Jumlah Anggota</p>
						<p class="fs-30 mb-2"><?= $anggota ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
				<div class="card card-light-danger">
					<div class="card-body">
						<p class="mb-4">Jumlah Buku </p>
						<p class="fs-30 mb-2"><?= $buku ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>