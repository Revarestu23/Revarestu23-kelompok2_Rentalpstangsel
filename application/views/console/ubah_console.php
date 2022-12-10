<div class="container">
    <?= form_open_multipart('console/ubahConsole/' . $console[0]['id']); ?>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="nama_console" name="nama_console" placeholder="Masukkan Nama Console" value="<?= $console[0]['nama_console']; ?>">
        <?= form_error('nama_console', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <select name="id_kategori" class="form-control form-control-user">
            <option value="">Pilih Kategori</option>
            <?php
            foreach ($kategori as $k) { ?>
                <option value="<?= $k['id_kategori']; ?>" <?= $console[0]['id_kategori'] == $k['id_kategori'] ? "selected" : ""; ?>><?= $k['nama_kategori']; ?></option>
            <?php } ?>
        </select>
        <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $console[0]['stok']; ?>">
        <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3" align="center">
                <img src="<?= base_url('assets/img/upload/') . $console[0]['image']; ?>" class="img-thumbnail" alt="">
                <font>Gambar Sebelumnya ...</font>
            </div>
            <input type="hidden" name="old_pict" value="<?= $console[0]['image']; ?>">
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Pilih file</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?= base_url('console'); ?>" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</a>
        <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Ubah</button>
    </div>
</div>