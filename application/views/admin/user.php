<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<!-- Button trigger modal -->
<div class="col-lg-12 mb-3 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add user
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('admin/user/save')?>" method="post">

					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" class="form-control" placeholder="Name" name="name" required>
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Username</label>
						<input type="text" class="form-control" placeholder="Name" name="username" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-group">
						<label>Level</label>
						<select class="form-control" name="level">
							<option value="admin">admin</option>
							<option value="anggota">anggota </option>
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
							<th>username</th>
							<th>level</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($user as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['name'] ?></td>
							<td><?= $yy['username'] ?></td>
							<td><?= $yy['level'] ?></td>
							<td>
								<a onclick="return confirm('are you sure?')"
									href="<?=base_url('admin/user/delete/'.$yy['user_id']);?>">
									<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
										<i class="ti ti-trash btn-mb-3"></i>
									</button>
								</a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $yy['user_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $yy['user_id'] ?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												<form class="forms-sample" action="<?=site_url('admin/user/update')?>"
													method="post">
													<input type="hidden" name="user_id" value="<?=$yy['user_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$yy ['name']?>" name="name" required>
													</div>
													<div class="form-group">
														<label for="exampleInputName1">Username</label>
														<input type="text" class="form-control"
															placeholder="<?=$yy ['username']?>" name="username"
															readonly>
													</div>
													<div class="form-group">
														<label>Level</label>
														<select class="form-control" name="level">
															<option value="admin">admin</option>
															<option value="anggota">anggota </option>
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
								<a onClick="return confirm ('Are you sure you want to reset the password?')"
									href="<?= base_url('admin/user/reset/'.$yy['user_id'])?>">
									<button type="button" class="btn btn-inverse-warning btn-icon">
										<i class="ti-loop"></i>
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
