<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pembayaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Pembayaran</li>
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
                <a href="/bayar/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                <a href="#cetakPembayaran" data-toggle="modal" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. SO</th>
                            <th>TGL. Bayar</th>
                            <th>Pelanggan</th>
                            <th>Biaya</th>
                            <th>Terbayar</th>
                            <th>Sisa</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($so as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_so']; ?></td>
                                <td><?= date('d M Y', strtotime($data['created_bayar'])); ?></td>
                                <td><?= ucwords($data['nama_pel']); ?></td>
                                <td>Rp.<?= number_format($data['jumlah'], 0, ',', '.'); ?></td>
                                <td>Rp.<?= number_format($data['terbayar'], 0, ',', '.'); ?></td>
                                <td>Rp.<?= number_format($data['sisa'], 0, ',', '.'); ?></td>
                                <td><?= $data['keterangan']; ?></td>
                                <td>
                                    <form action="bayar/detail" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="noso" value="<?= $data['no_so']; ?>">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->include('components/modal-print'); ?>
<?= $this->endSection(); ?>