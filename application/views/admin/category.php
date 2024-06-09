<div id="hilang">
	<?=$this->session->flashdata('alert');?>
</div>

<div class="col-lg-12 ">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		add category 
	</button>
</div>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="forms-sample" action="<?=site_url('admin/category/save')?>" method="post">
					<div class="form-group">
						<label for="exampleInputName1">Name Category</label>
						<input type="text" class="form-control" placeholder="Name" name="name_category" required>
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

			<h4 class="card-title">Data Category</h4>
			<div class="table-responsive pt-3">
				<table class="table table-striped" id="tabelku">
					<thead>
						<tr>
							<th>no</th>
							<th>name</th>
							<th>action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ; foreach ($category as $yy) {?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $yy['name_category'] ?></td>
							<td>
								<a onclick="return confirm('are you sure?')"
									href="<?=base_url('admin/category/delete/'.$yy['category_id']);?>">
									<button type="button" class="btn btn-inverse-dark btn-fw btn-icon">
										<i class="ti ti-trash btn-mb-3"></i>
									</button>
                                </a>
								<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="modal"
									data-target="#edit<?= $yy['category_id'] ?>"><i class="ti-pencil-alt"></i>
								</button>
								<div class="modal fade bd-example-modal-md" id="edit<?= $yy['category_id'] ?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-md" role="document">
										<div class="modal-content ">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form class="forms-sample" action="<?=site_url('admin/category/edit')?>"
													method="post">
													<input type="hidden" name="category_id" value="<?=$yy['category_id']?>">
													<div class="form-group">
														<label for="exampleInputName1">Name</label>
														<input type="text" class="form-control" placeholder="Name"
															value="<?=$yy ['name_category']?>" name="name_category" required>
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
