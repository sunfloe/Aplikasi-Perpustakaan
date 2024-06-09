<div class="card">
    <div class="card-body">
        
        <form action="<?= site_url('admin/collection/save')?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="col-form-label">Judul Buku:</label>
                <input type="text" class="form-control" name="book_title" placeholder="Masukkan Judul Buku" required>
            </div>

            <div class="mb-3">
                <label class="col-form-label">Cover:</label>
                <input type="file" class="form-control" name="cover" placeholder="Masukkan cover Buku"  accept="iage/png, image/gif, image/jpeg">
            </div>
            
            <div class="mb-">
                <label for="" class="col-form-label">Nomor Buku</label>
                <input type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode buku" required>
            </div>
            <div class="mb-3">
                <label class="col-form-label">ISBN:</label>
                <input type="text" class="form-control" name="isbn" placeholder="ISBN" required>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Kategori Buku: <p>Daftar kategori buku tidak ada? <a href="<?=base_url('admin/category')?>">tambah kategori baru <i class="ti-arrow-top-right"></i></a></p></label>
                <select name="category_id" class="form-control" placeholder="Pilih Kategori">
                <option value="" readonly></option>
                <?php foreach ($category as $we) { ?>

                            <option value="<?= $we['category_id'] ?>">
                                <?= $we['name_category'] ?>
                            </option>
				<?php }; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Penulis:<p>Daftar penulis tidak ada? <a href="<?=base_url('admin/penulis')?>">tambah penulis baru <i class="ti-arrow-top-right"></i></a></p></label>
                    <select name="penulis_id" class="js-example-basic-single form-control" placeholder="Nama Penulis">
                    <option value="" readonly></option>
                    <?php foreach ($penulis as $we) { ?>
                            <option value="<?= $we['penulis_id'] ?>">
                                <?= $we['name'] ?>
                            </option>
				    <?php }; ?>
                    </select>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Penerbit:<p>Data Penerbit buku tidak ada? <a href="<?=base_url('admin/penerbit')?>">tambah penerbit baru <i class="ti-arrow-top-right"></i></a></p></label>
                    <select name="penerbit_id" class="form-control" placehoder="Nama Penerbit:" id="js-example-basic-single">
                    <option value="" readonly></option>
                        <?php foreach ($penerbit as $we) { ?>
                            <option value="<?= $we['penerbit_id'] ?>">
                                <?= $we['name_penerbit'] ?>
                            </option>
				        <?php }; ?>
                    </select>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Rak:<p>Rak buku tidak ada? <a href="<?=base_url('admin/rak')?>">tambah rak baru <i class="ti-arrow-top-right"></i></a></p></label>
                    <select name="rak_id" class="form-control" placehoder="Penempatan Buku:" id="js-example-basic-single">
                    <option value="" readonly></option>
                        <?php foreach ($rak as $we) { ?>
                            <option value="<?= $we['rak_id'] ?>">
                                <?= $we['nomor_rak'] ?>
                            </option>
				        <?php }; ?>
                    </select>
            </div>
            <div class="mb-3">
                <label class="col-form-label">Tahun Terbit:</label>
                <input type="text" class="form-control" name="tahun" placeholder="Tahun terbit" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
