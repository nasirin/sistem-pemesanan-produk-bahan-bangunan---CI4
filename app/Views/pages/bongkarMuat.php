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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>