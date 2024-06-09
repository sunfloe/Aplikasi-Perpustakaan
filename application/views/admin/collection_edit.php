<div class="card">
    <div class="card-body">
        <form action="<?= site_url('admin/collection/update') ?>" method="post" enctype="multipart/form-data">
            <?php foreach($collection as $ya) { ?>
                <input type="hidden" name="book_id" value="<?= $ya['book_id'] ?>">
                <input type="hidden" name="old_cover" value="<?= $ya['cover'] ?>">

                <div class="mb-3">
                    <label class="col-form-label">Judul Buku:</label>
                    <input type="text" class="form-control" name="book_title" placeholder="Masukkan Judul Buku" value="<?= $ya['book_title'] ?>"/>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Cover:</label>
                    <input type="file" class="form-control" name="cover" placeholder="Masukkan cover Buku" accept="image/png, image/gif, image/jpeg">
                    <?php if ($ya['cover']) { ?>
                        <img src="<?= base_url('assets/upload/cover/' . $ya['cover']) ?>" alt="Cover Buku" style="max-height: 100px; margin-top: 10px;">
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label class="col-form-label">Nomor Buku:</label>
                    <input type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode buku" value="<?= $ya['kode_buku'] ?>">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">ISBN:</label>
                    <input type="text" class="form-control" name="isbn" placeholder="ISBN" value="<?= $ya['isbn'] ?>">
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Kategori Buku: </label>
                    <select name="category_id" class="form-control" placeholder="Pilih Kategori">
                        <?php foreach ($category as $we) { ?>
                            <option value="<?= $we['category_id'] ?>" <?= $we['category_id'] == $ya['category_id'] ? 'selected' : '' ?>>
                                <?= $we['name_category'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Penulis:</label>
                    <select name="penulis_id" class="js-example-basic-single form-control" placeholder="Nama Penulis">
                        <?php foreach ($penulis as $we) { ?>
                            <option value="<?= $we['penulis_id'] ?>" <?= $we['penulis_id'] == $ya['penulis_id'] ? 'selected' : '' ?>>
                                <?= $we['name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Penerbit:</label>
                    <select name="penerbit_id" class="form-control" placeholder="Nama Penerbit" id="js-example-basic-single">
                        <?php foreach ($penerbit as $we) { ?>
                            <option value="<?= $we['penerbit_id'] ?>" <?= $we['penerbit_id'] == $ya['penerbit_id'] ? 'selected' : '' ?>>
                                <?= $we['name_penerbit'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Rak:</label>
                    <select name="rak_id" class="form-control" placeholder="Nama Penerbit" id="js-example-basic-single">
                        <?php foreach ($rak as $we) { ?>
                            <option value="<?= $we['rak_id'] ?>" <?= $we['rak_id'] == $ya['rak_id'] ? 'selected' : '' ?>>
                                <?= $we['nomor_rak'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="col-form-label">Tahun Terbit:</label>
                    <input type="text" class="form-control" name="tahun" placeholder="Tahun terbit" value="<?= $ya['tahun'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            <?php } ?>
        </form>
    </div>
</div>
