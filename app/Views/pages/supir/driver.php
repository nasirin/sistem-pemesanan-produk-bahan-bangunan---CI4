<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Supir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Supir</li>
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
                <a href="/driver/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kd. Supir</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No.Telepon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($driver as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['kd_supir']; ?></td>
                                <td><?= $data['nama_supir']; ?></td>
                                <td><?= $data['jln_supir']; ?></td>
                                <td><?= $data['notelp_supir']; ?></td>
                                <td><?= $data['status_supir']; ?></td>
                                <td>
                                    <a href="/driver/ubah/<?= $data['kd_supir']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                    <a href="/driver/hapus/<?= $data['kd_supir']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')"> <i class="fa fa-trash"></i> </a>
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