<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Pelanggan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/pelanggan">Data Pelanggan</a> </li>
                    <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            
            <div class="card-body">
                <form action="/pelanggan/insert" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-lg-2 col-form-label">Kode pelanggan</label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" id="id" name="kd" value="<?= $kode; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Nama pelanggan <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Pelanggan" value="<?= old('nama'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">No. Telepon <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="number" min="0" class="form-control" name="notelp" placeholder="Masukan No. Telepon" value="<?= old('notelp'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Contact person <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" name="cp" placeholder="Masukan kontak person" value="<?= old('cp'); ?>" required>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Jalan <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="jln" value="" placeholder="Masukan Jalan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Nomor <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="number" min="0" class="form-control" name="no-jln" placeholder="Nama Pelanggan" value="<?= old('nama'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">kota <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="kota" placeholder="Nama Pelanggan" value="<?= old('nama'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelurahan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="texxt" class="form-control" name="kelurahan" placeholder="Nama Produk" value="<?= old('tgl-so'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kecamatan <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="texxt" class="form-control" name="kecamatan" placeholder="Nama Produk" value="<?= old('tgl-so'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">kode pos <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="number" min="0" class="form-control" name="kodepos" placeholder="Nama Produk" value="<?= old('tgl-so'); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/pelanggan" class="btn btn-block btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->

<?= $this->include('components/modal-print'); ?>
<?= $this->endSection(); ?>