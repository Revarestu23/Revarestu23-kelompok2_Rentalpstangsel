<div class="container">
    <?= form_open_multipart('member/ubahMember/' . $member[0]['id_member']); ?>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" id="nama_member" name="nama_member" placeholder="Masukkan Nama Member" value="<?= $member[0]['nama_member']; ?>">
        <?= form_error('nama_member', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-3" align="center">
                <img src="<?= base_url('assets/img/upload/') . $member[0]['image']; ?>" class="img-thumbnail" alt="">
                <font>Gambar Sebelumnya ...</font>
            </div>
            <input type="hidden" name="old_pict" value="<?= $member[0]['image']; ?>">
            <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Pilih file</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="<?= base_url('member'); ?>" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</a>
        <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i> Ubah</button>
    </div>
</div>