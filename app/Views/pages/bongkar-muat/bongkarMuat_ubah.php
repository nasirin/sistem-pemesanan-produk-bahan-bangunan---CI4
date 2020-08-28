<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Bongkar Muat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/BM">Bongkar Muat</a> </li>
                    <li class="breadcrumb-item active">Ubah Bongkar Muat</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="/BM/ganti/<?= $sj['no_sj']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" value="<?= $sj['no_so']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="nama" value="<?= $so['nama_pel']; ?>" placeholder="Nama Pelanggan" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. SO<small class="text-danger">*</small> </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tgl" value="<?= date('d M Y', strtotime($so['created_so'])); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SJ</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" name="nosj" value="<?= $sj['no_sj']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. SJ<small class="text-danger">*</small> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" value="<?= $sj['created_sj']; ?>"  readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. Tiba<small class="text-danger">*</small> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl-tiba" value="<?= old('tgl-so'); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end line -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/BM" class="btn btn-block btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>