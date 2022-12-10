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
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#consoleBaruModal"><i class="fas fa-file-alt"></i> Console Baru</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Console</th>
                        <th scope="col">Stok Console</th>
                        <th scope="col">DiPinjam</th>
                        <th scope="col">DiBooking</th>
                        <th scope="col">Gambar</th>

                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($console as $c) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $c['nama_console']; ?></td>
                            <td><?= $c['stok']; ?></td>
                            <td><?= $c['dipinjam']; ?></td>
                            <td><?= $c['dibooking']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?=
                                                base_url('assets/img/upload/') . $c['image']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                            </td>
                            <td>
                                <a href="<?=
                                            base_url('console/ubahConsole/') . $c['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?=
                                            base_url('console/hapusconsole/') . $c['id']; ?>" onclick="returnconfirm('Kamu yakin akan menghapus <?= $judul . '' . $c['nama_console']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</div>


<div class="modal fade" id="consoleBaruModal" tabindex="-1" role="dialog" aria-labelledby="consoleBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="consoleBaruModalLabel">Tambah Console</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('console'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_console" name="nama_console" placeholder="Masukkan Nama Console">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id_kategori']; ?>"><?=
                                                                            $k['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
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