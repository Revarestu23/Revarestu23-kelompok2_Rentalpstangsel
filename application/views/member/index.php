<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#memberBaruModal"><i class="fas fa-file-alt"></i> Member Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Member</th>
                        <th scope="col">Nama Member</th>

                        <th scope="col">Kartu Pengenal</th>

                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($member as $m) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $m['id_member']; ?></td>
                            <td><?= $m['nama_member']; ?></td>


                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?=
                                                base_url('assets/img/upload/') . $m['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td>

                                <a href="<?=
                                            base_url('member/hapusmember/') . $m['id_member']; ?>" onclick="returnconfirm('Kamu yakin akan menghapus <?= $judul . '' . $m['nama_member']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>


<div class="modal fade" id="memberBaruModal" tabindex="-1" role="dialog" aria-labelledby="memberBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberBaruModalLabel">Tambah Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_member" name="nama_member" placeholder="Masukkan Nama Member">
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>