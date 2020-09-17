<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pembayaran Detail</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/bayar">Pembayaran</a></li>
                    <li class="breadcrumb-item active">Pembayaran Detail</li>
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
                <form action="/bayar/tambah" method="POST">
                    <?= csrf_field(); ?>
                    <?php foreach ($bayar as $data) : ?>
                        <input type="hidden" name="nobar" value="<?= $data['no_bayar']; ?>">
                    <?php endforeach; ?>
                    <button class="btn btn-primary" type="submit"> <i class="fa fa-plus"></i> Bayar</button>
                </form>
                <!-- <a href="" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a> -->
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. SO</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Terbayar</th>
                            <th>Sisa</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($bayar as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_so']; ?></td>
                                <td><?= $data['nama_pel']; ?></td>
                                <td><?= $data['harga_so']; ?></td>
                                <td><?= $data['terbayar']; ?></td>
                                <td><?= $data['sisa']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                                <td>
                                    <form action="/bayar/edit" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="nobar" value="<?= $data['no_bayar']; ?>">
                                        <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-edit"></i></button>
                                    </form>
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