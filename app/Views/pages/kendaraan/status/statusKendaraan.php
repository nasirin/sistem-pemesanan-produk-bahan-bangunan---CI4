<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Status Kendaraan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Status Kendaraan</li>
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
                            <th>Posisi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sk as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_perk']; ?></td>
                                <td><?= $data['no_plat']; ?></td>
                                <td><?= $data['jenis']; ?></td>
                                <td><?= $data['tonase']; ?></td>
                                <td><?= $data['volume']; ?></td>
                                <td><?= $data['notelp_supir']; ?></td>
                                <td><?= $data['posisi']; ?></td>
                                <td><?= $data['status_ekspedisi']; ?></td>
                                <td>
                                    <a href="/sk/ubah/<?= $data['no_perk']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
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