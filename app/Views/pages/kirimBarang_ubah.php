<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Kirim Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/kirim">Kirim Barang</a> </li>
                    <li class="breadcrumb-item active">Ubah Kirim Barang</li>
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
                <form action="/kirim/ganti/<?= $kirim['no_so']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="row justify-content-between">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="noso" value="<?= $kirim['no_so']; ?>" readonly>
                                    <!-- nobar -->
                                    <input type="hidden" name="nobar" value="<?= $kirim['no_bayar']; ?>">
                                    <input type="hidden" name="id_detail" value="<?= $kirim['id_detail_kirim']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Pelanggan <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9 ">
                                    <select name="pelanggan" id="pelanggan" class="form-control select2" id="pelanggan" required onchange="autofill2()" required>
                                        <option value="<?= $kirim['kd_pel']; ?>">Selected : <?= $kirim['nama_pel']; ?></option>
                                        <option value="">--- Pilih Pelanggan ---</option>
                                        <?php foreach ($pelanggan as $data) : ?>
                                            <option value="<?= $data['kd_pel']; ?>"><?= $data['nama_pel']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. SO<small class="text-danger">*</small> </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl-so" value="<?= old('tgl-so') ?? $kirim['created_at']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SJ</label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="nosj" value="<?= $kirim['no_sj']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Jurusan<small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= old('jurusan') ?? $kirim['tujuan']; ?>" placeholder="Masukan Jurusan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Penerima</label>
                                <div class="col-sm-9 col-lg-9 ">
                                    <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Masukan penerima" value="<?= $kirim['nama_pel']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Jenis Muatan <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" name="jm" placeholder="Masukan Jenis muatan" value="<?= old('jm') ?? $kirim['jenis']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Berat Muatan <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="input-group">
                                        <input type="number" min="0" class="form-control" name="bm" placeholder="Masukan berat muatan" value="<?= old('bm') ?? $kirim['berat']; ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">/ton</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-lg-3 col-form-label">Harga <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="0" name="harga" placeholder="Masukan harga" value="<?= old('harga') ?? $kirim['jumlah']; ?>" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">/ton</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tgl. kirim</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl-kirim" placeholder="Nama Produk" value="<?= old('tgl-kirim') ?? $kirim['created_at']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Perk <small class="text-danger">*</small></label>
                                <div class="col-sm-9">
                                    <select name="no-perk" class="form-control select2" id="noperk" onchange="autofill()" required>
                                        <option value="<?= $kirim['no_perk']; ?>"><?= $kirim['no_perk']; ?></option>
                                        <option value="">--Pilih No. Perk--</option>
                                        <?php foreach ($kendaraan as $data) : ?>
                                            <option value="<?= $data['no_perk']; ?>"><?= $data['no_perk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Polisi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nopol" name="no-pol" placeholder="Masukan No.Polisi" value="<?= $kirim['no_plat']; ?>" readonly>
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
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-warning">Ubah</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/pelanggan" class="btn btn-block btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection(); ?>