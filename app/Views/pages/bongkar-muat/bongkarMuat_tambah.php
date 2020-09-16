<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Muat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/kirim">Bongkar muat</a> </li>
                    <li class="breadcrumb-item active">Tambah muat</li>
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
                <form action="/BM/simpan" method="POST">
                    <?= csrf_field(); ?>
                    <?php foreach ($sj as $data) : ?>
                        <div class="row justify-content-between">
                            <!-- line 1 -->
                            <div class="col-lg-7">
                                <div class="form-group row">
                                    <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                    <div class="col-sm-9 col-lg-9">
                                        <input type="text" class="form-control" name="noso" value="<?= $data['no_so']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">No. Pelanggan</label>
                                    <div class="col-sm-9 col-lg-9 ">
                                        <input type="text" value="<?= $data['kd_pel']; ?>" name="pelanggan" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama</label>
                                    <div class="col-sm-9 col-lg-9">
                                        <input type="text" class="form-control" id="nama" value="<?= $data['nama_pel']; ?>" placeholder="Nama Pelanggan" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tgl. SO </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tgl-so" value="<?= date('d M Y', strtotime($data['created_so'])); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- line 2 -->
                        <div class="row justify-content-between">
                            <div class="col-lg-7">
                                <div class="form-group row">
                                    <label for="id" class="col-sm-3 col-lg-3 col-form-label">Jurusan</label>
                                    <div class="col-sm-9 col-lg-9">
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $data['jurusan']; ?>" placeholder="Masukan Jurusan" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Penerima</label>
                                    <div class="col-sm-9 col-lg-9 ">
                                        <input type="text" class="form-control" id="penerima" placeholder="Masukan penerima" value="<?= $data['nama_pel']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Jenis Muatan </label>
                                    <div class="col-sm-9 col-lg-9">
                                        <input type="text" class="form-control" name="jm" placeholder="Masukan Jenis muatan" value="<?= $data['muatan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Berat Muatan </label>
                                    <div class="col-sm-9 col-lg-9">
                                        <div class="input-group">
                                            <input type="number" min="0" class="form-control" name="bm" placeholder="Masukan berat muatan" value="<?= $data['berat']; ?>" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">/ton</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Terkirim </label>
                                    <div class="col-sm-9 col-lg-9">
                                        <div class="input-group">
                                            <input type="number" min="0" class="form-control" name="terkirim" placeholder="Masukan berat muatan" value="<?= $data['terkirim']; ?>" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">/ton</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Tersisa <span class="text-danger">*</span></label>
                                    <div class="col-sm-9 col-lg-9">
                                        <div class="input-group">
                                            <input type="number" min="0" class="form-control" name="tersisa" placeholder="Masukan berat muatan" value="<?= $data['tersisa']; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text">/ton</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-lg-3 col-form-label">Harga</label>
                                    <div class="col-sm-9 col-lg-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" min="0" name="harga" placeholder="Masukan harga" value="Rp. <?= number_format($data['harga_so'], 0, ',', '.'); ?>" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">/ton</span>
                                            </div>
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
                                            <option value="<?= $data['no_perk']; ?>"><?= $data['no_perk']; ?></option>
                                            <option value="">--Pilih No. Perk--</option>
                                            <?php foreach ($kendaraan as $data) : ?>
                                                <option value="<?= $data['no_perk']; ?>"><?= $data['no_perk']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php foreach ($sj as $data) : ?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No. Polisi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nopol" name="no-pol" placeholder="Masukan No.Polisi" value="<?= $data['no_plat']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sopir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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