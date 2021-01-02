<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Kirim Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/kirim">Kirim Barang</a> </li>
                    <li class="breadcrumb-item active">Tambah Kirim Barang</li>
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
                <form action="/kirim/simpan" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="noso" value="<?= $noso; ?>" readonly>
                                    <!-- nobar -->
                                    <input type="hidden" name="nobar" value="<?= $nobar; ?>">
                                    <input type="hidden" name="nosj" value="<?= $nosj; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">No. Pelanggan <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9 ">
                                    <select name="pelanggan" id="pelanggan" class="form-control select2" id="pelanggan" required onchange="autofill2()" required>
                                        <option value="">--- Pilih Pelanggan ---</option>
                                        <?php foreach ($pelanggan as $data) : ?>
                                            <option value="<?= $data['kd_pel']; ?>"><?= $data['nama_pel']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="nama" value="" placeholder="Nama Pelanggan" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. SO<span class="text-danger">*</span> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl-so" value="<?= old('tgl-so'); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- line 2 -->
                    <div class="row justify-content-between">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Jurusan <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= old('jurusan'); ?>" placeholder="Masukan Jurusan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Penerima <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9 ">
                                    <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Masukan penerima" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Jenis Muatan <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="jm" placeholder="Masukan Jenis muatan" value="<?= old('jm'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Berat Muatan <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="input-group">
                                        <input type="number" min="0" class="form-control" name="bm" id="berat" placeholder="Masukan berat muatan" value="<?= old('bm'); ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">/ton</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Harga <span class="text-danger">*</span></label>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="0" id="harga" name="harga" placeholder="Masukan harga" value="<?= old('harga'); ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">/ton</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Total</label>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="input-group">
                                        <input type="number" id="total" class="form-control" min="0" placeholder="Total harga" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. kirim <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl-kirim" placeholder="Nama Produk" value="<?= old('tgl-kirim'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Perk <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="no-perk" class="form-control select2" id="noperk" onchange="autofill()" required>
                                        <option value="">--Pilih No. Perk--</option>
                                        <?php foreach ($kendaraan as $data) : ?>
                                            <option value="<?= $data['no_perk']; ?>"><?= $data['no_perk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Polisi <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nopol" name="no-pol" placeholder="Masukan No.Polisi" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Sopir</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Masukan Nama Sopir" value="" readonly>
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
                            <a href="/kirim" class="btn btn-block btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>