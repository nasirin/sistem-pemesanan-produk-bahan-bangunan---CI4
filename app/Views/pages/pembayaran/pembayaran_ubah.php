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
                <form action="/bayar/ubah" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" name="noso" value="<?= $bayar['no_so']; ?>" class="form-control" readonly>
                                    <input type="hidden" name="nobar" value="<?= $bayar['no_bayar']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="hidden" name="pelanggan" class="form-control" value="<?= $bayar['kd_pel']; ?>">
                                    <input type="text" value="<?= ucwords($bayar['nama_pel']); ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Biaya <small>/ ton</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="hidden" name="harga" value="<?= $bayar['harga_so']; ?>">
                                    <input type="text" class="form-control" value="Rp <?= number_format($bayar['harga_so'], 0, ',', '.'); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Total Biaya</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="hidden" name="harga" value="<?= $bayar['harga_so']; ?>">
                                    <input type="text" class="form-control" value="Rp <?= number_format($bayar['totalHargaSO'], 0, ',', '.'); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Terbayar akhir</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="hidden" name="terbayar" value="<?= $bayar['terbayar']; ?>">
                                    <input type="text" class="form-control" placeholder="Rp." value="Rp <?= number_format($bayar['terbayar'], 0, ',', '.'); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Sisa</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="hidden" name="sisa" value="<?= $bayar['sisa']; ?>">
                                    <input type="text" class="form-control" placeholder="Rp." value="Rp <?= number_format($bayar['sisa'], 0, ',', '.'); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. Bayar <span class="text-danger">*</span> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_bayar" required value="<?=$bayar['created_bayar']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- line 1 -->
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Jml. Bayar <span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-lg-10">
                            <input type="number" min="0" id="jmlBayar" class="form-control" name="terbayar" onkeyup="terbilang(this,'bayarTerbilang')" value="<?= $bayar['terbayar'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Terbilang</label>
                        <div class="col-sm-9 col-lg-10">
                            <input type="text" id="bayarTerbilang" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Keterangan <span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-lg-10">
                            <select name="keterangan" class="form-control select2" required>
                                <option value="">--- Pilih Keterangan ---</option>
                                <option value="lunas" <?= $bayar['keterangan'] == 'lunas' ? 'selected' : '' ?>>Lunas</option>
                                <option value="dp" <?= $bayar['keterangan'] == 'dp' ? 'selected' : '' ?>>DP</option>
                            </select>
                        </div>
                    </div>

                    <!-- end line -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Ubah</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/bayar" class="btn btn-block btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>