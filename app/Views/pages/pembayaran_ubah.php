<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form Pembayaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/bayar">Pembayaran</a> </li>
                    <li class="breadcrumb-item active">Form Pembayaran</li>
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
                <form action="/bayar/ganti/<?= $so['no_so']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="nobar" value="<?= $so['no_bayar']; ?>">
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="noso" value="<?= $so['no_so']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="nama" value="<?= $so['nama_pel']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Total biaya <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" value="<?= 'Rp.' . number_format($so['jumlah'], 0, ',', '.'); ?>" readonly>
                                    <input type="hidden" class="form-control" id="total" value="<?= $so['jumlah']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Terbayar <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control terbayar" name="terbayar" id="terbayar" placeholder="Masukan pembayaran" onkeyup="kembalian()">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Sisa <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="sisa" value="" placeholder="kekurangan biaya" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. Bayar<small class="text-danger">*</small> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_bayar" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Terbilang</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" id="terbilang" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9 col-lg-9">
                                    <select name="status_so" class="form-control select2" required>
                                        <option value="">--- Pilih Keterangan ---</option>
                                        <option value="lunas" <?= $so['status_so'] == 'lunas' ? 'selected':''; ?>>Lunas</option>
                                        <option value="belum lunas" <?= $so['status_so'] == 'belum lunas' ? 'selected':''; ?>>DP</option>
                                    </select>
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