<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data Supir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/Supir">Data Supir</a> </li>
                    <li class="breadcrumb-item active">Tambah Data Supir</li>
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
                <form action="/Driver/insert" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Kode Supir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="kd" value="<?= $kode; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Supir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Supir" value="<?= old('nama'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" name="notelp" placeholder="Masukan No. Telepon" value="<?= old('notelp'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control select2">
                                <option value="">--- Pilih Status ---</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Jalan</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="jln" value="" placeholder="Masukan Jalan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Nomor</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="number" min="0" class="form-control" name="no-jln" placeholder="Nama Supir" value="<?= old('nama'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">kota</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="kota" placeholder="Kota Supir" value="<?= old('kota'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kelurahan</label>
                                <div class="col-sm-9">
                                    <input type="texxt" class="form-control" name="kelurahan" placeholder="Kelurahan" value="<?= old('kelurahan'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <input type="texxt" class="form-control" name="kecamatan" placeholder="Kecamatan" value="<?= old('kecamatan'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">kode pos</label>
                                <div class="col-sm-9">
                                    <input type="number" min="0" class="form-control" name="kodepos" placeholder="Kode pos" value="<?= old('kodepos'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/driver" class="btn btn-block btn-secondary">Batal</a>
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