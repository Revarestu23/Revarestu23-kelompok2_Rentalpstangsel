<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- row ux-->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-light text-uppercase mb-1">Jumlah Petugas</div>
                            <div class="h1 mb-0 font-weight-bold text-light"><?=
                                                                                $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows();
                                                                                ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('admin'); ?>"><i class="fas fa-users fa-3x text-warning"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-light text- uppercase mb-1">Stok Console</div>
                            <div class="h1 mb-0 font-weight-bold text-light">
                                <?php
                                $where = ['stok != 0'];
                                $totalstok = $this->ModelC->total(
                                    'stok',
                                    $where
                                );
                                echo $totalstok;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('console'); ?>"><i style="font: size 48px;"></i>🎮</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Console yang dipinjam</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['dipinjam != 0'];
                                $totaldipinjam = $this->ModelC->total(
                                    'dipinjam',
                                    $where
                                );
                                echo $totaldipinjam;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('console'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-white text-uppercase mb-1">Console yang dibooking</div>
                            <div class="h1 mb-0 font-weight-bold text-white">
                                <?php
                                $where = ['dibooking !=0'];
                                $totaldibooking = $this->ModelC->total('dibooking', $where);
                                echo $totaldibooking;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('console'); ?>"><i class="fas fa-shopping-cart fa-3x text-danger"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row ux-->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- row table-->
    <div class="row">
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-users text-danger mt-2 "> Data
                    User</span>

            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Petugas</th>
                        <th>Email</th>
                        <th>Role ID</th>
                        <th>Aktif</th>
                        <th>Member Sejak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($petugas as $p) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['email']; ?></td>
                            <td><?= $p['role_id']; ?></td>
                            <td><?= $p['is_active']; ?></td>
                            <td><?= date('Y', $p['tanggal_input']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
            <div class="page-header">
                <span class="fas fa-book text-danger mt-2"> Data
                    Console</span>
                <a href="<?= base_url('console'); ?>"><i class="fas fa-search 
text-danger mt-2 float-right"> Tampilkan</i></a>
            </div>
            <div class="table-responsive">
                <table class="table mt-3" id="table-datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Console</th>
                            <th>Nama Console</th>
                            <th>Stok Console</th>
                            <th>Console Yang Dipinjam</th>
                            <th>Console Yang Dibooking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($console as $c) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $c['id']; ?></td>
                                <td><?= $c['nama_console']; ?></td>
                                <td><?= $c['stok']; ?></td>
                                <td><?= $c['dipinjam']; ?></td>
                                <td><?= $c['dibooking']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end of row table-->
</div>