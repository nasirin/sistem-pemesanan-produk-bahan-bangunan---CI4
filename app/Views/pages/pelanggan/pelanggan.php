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
                <a href="/pelanggan/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Pel</th>
                            <th>Nama</th>
                            <th>No. Telp</th>
                            <th>Person</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelanggan as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['kd_pel']; ?></td>
                                <td><?= $data['nama_pel']; ?></td>
                                <td><?= $data['notelp_pel']; ?></td>
                                <td><?= $data['cp_pel']; ?></td>
                                <td><?= "Jln." . $data['jln_pel'] . ", No." . $data['no_jln_pel'] . ". " . $data['kota_pel']; ?></td>
                                <td>
                                    <a href="/pelanggan/ubah/<?= $data['kd_pel']; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                                    <a href="/pelanggan/hapus/<?= $data['kd_pel']; ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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
<?= $this->endSection(); ?>