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
                <form action="/bayar/simpan" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="nobar" value="<?= $nobar; ?>">
                    <input type="hidden" name="nosj" id="nosj">
                    <input type="hidden" name="pelanggan" id="kdpel" >
                    <input type="hidden" name="no-perk" id="noperk">                    
                    <div class="row justify-content-between">
                        <!-- line 1 -->
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">No. SO</label>
                                <div class="col-sm-9 col-lg-9">
                                    <select name="noso" id="noso" class="form-control select2" onchange="cariBySo()">
                                        <option value="">--- Pilih So ---</option>
                                        <?php foreach ($so as $data) : ?>
                                            <option value="<?= $data['no_so']; ?>"><?= $data['no_so']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Nama <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" id="pel" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Total biaya <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="total" name="jumlah" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Terbayar akhir <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="terbayar" placeholder="0" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-lg-3 col-form-label">Sisa <small class="text-danger">*</small></label>
                                <div class="col-sm-9 col-lg-9">
                                    <input type="text" class="form-control" id="sisa" name="sisa" value="" placeholder="0" readonly>
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
                    <!-- line 1 -->
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Jml. Bayar</label>
                        <div class="col-sm-9 col-lg-10">
                            <input type="number" min="0" id="jmlBayar" class="form-control" name="terbayar" onkeyup="terbilang(this,'bayarTerbilang')" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Terbilang</label>
                        <div class="col-sm-9 col-lg-10">
                            <input type="text" id="bayarTerbilang" class="form-control" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-lg-2 col-form-label">Keterangan</label>
                        <div class="col-sm-9 col-lg-10">
                            <select name="status_so" class="form-control select2" required>
                                <option value="">--- Pilih Keterangan ---</option>
                                <option value="lunas">Lunas</option>
                                <option value="dp">DP</option>
                            </select>
                        </div>
                    </div>

                    <!-- end line -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
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