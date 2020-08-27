<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pengiriman Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Pengiriman Barang</li>
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
                <a href="/kirim/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                <a href="" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SO</th>
                            <th>SJ</th>
                            <th>Penerima</th>
                            <th>Barang</th>
                            <th>Berat</th>
                            <th>Harga <small>/ton</small></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kirimbarang as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_so']; ?></td>
                                <td><?= $data['no_sj']; ?></td>
                                <td><?= $data['nama_pel']; ?></td>
                                <td><?= $data['muatan']; ?></td>
                                <td><?= $data['berat']; ?></td>
                                <td><?= $data['jumlah']; ?></td>
                                <td>
                                <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
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