<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Batal Muat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Batal Muat</li>
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

            <!-- <div class="card-header"> -->
            <!-- <a href="/BM/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a> -->
            <!-- <a href="" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a> -->
            <!-- </div> -->
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. SO</th>
                            <th>No. SJ</th>
                            <th>TGL. Kirim</th>
                            <th>Penerima</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sj as $data) : ?>
                            <?php if ($data['status_sj'] != 'batal') : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['no_so']; ?></td>
                                    <td><?= $data['no_sj']; ?></td>
                                    <td><?= $data['created_sj']; ?></td>
                                    <td><?= $data['penerima']; ?></td>
                                    <td>
                                        <form action="batal/batal" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="nosj" value="<?= $data['no_sj']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Pengiriman barang <?= $data['no_so'] ?> ingin di batalkan?')">Batal</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
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