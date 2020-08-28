<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Data kendaraan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/kendaraan">Data kendaraan</a> </li>
                    <li class="breadcrumb-item active">Tambah Data kendaraan</li>
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
                <form action="/kendaraan/insert" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-lg-2 col-form-label">Kode perkiraan</label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" name="kd" value="<?= $kode; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">No. Plat <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" name="noplat" placeholder="Masukan Nomor Polisi" value="<?= old('noplat'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Jenis kendaraan <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <select name="jenis" id="" class="form-control select2" required>
                                <option value="">--- Pilih Jenis ---</option>
                                <option value="build up">Build Up</option>
                                <option value="engkel">Engkel</option>
                                <option value="dolly">Dolly</option>
                                <option value="tronton besar">Tronton Besar</option>
                                <option value="low bed">Low Bed</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Berat Muatan <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <input type="number" min="0" class="form-control" name="berat" placeholder="Masukan berat muatan" value="<?= old('berat'); ?>" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">/ton</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Panjang <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <input type="number" min="0" class="form-control" name="panjang" placeholder="Masukan panjang kendaraan" value="<?= old('panjang'); ?>" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">/meter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Driver <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <select name="driver" id="" class="form-control select2" required>
                                <option value="">--- Pilih Driver ---</option>
                                <?php foreach ($driver as $data) : ?>
                                    <option value="<?= $data['kd_supir']; ?>"><?= $data['nama_supir']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/kendaraan" class="btn btn-block btn-secondary">Batal</a>
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