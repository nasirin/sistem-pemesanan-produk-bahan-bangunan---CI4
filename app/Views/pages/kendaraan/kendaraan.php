<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pelanggan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Pelanggan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card-header">
                <a href="/kendaraan/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                <!-- <a href="" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a> -->
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Perk</th>
                            <th>No. Plat</th>
                            <th>Jenis Kendaraan</th>
                            <th>Berat</th>
                            <th>Volume</th>
                            <th>No. Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kendaraan as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_perk']; ?></td>
                                <td><?= $data['no_plat']; ?></td>
                                <td><?= $data['jenis']; ?></td>
                                <td><?= $data['tonase']; ?></td>
                                <td><?= $data['volume']; ?></td>
                                <td><?= $data['notelp_supir']; ?></td>
                                <td>
                                    <a href="kendaraan/ubah/<?= $data['no_perk']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                    <a href="kendaraan/hapus/<?= $data['no_perk']; ?>" onclick="return confirm('Apakah anda Yakin?')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

<?= $this->include('components/modal-print'); ?>
<?= $this->endSection(); ?>