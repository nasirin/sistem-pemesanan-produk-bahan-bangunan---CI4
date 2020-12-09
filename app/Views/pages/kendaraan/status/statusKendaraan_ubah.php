<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Status Kendaraan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/sk">Status Kendaraan</a> </li>
                    <li class="breadcrumb-item active">Ubah Status Kendaraan</li>
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
                <form action="/sk/update/<?= $sk['no_perk']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">No Perk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="noperk" value="<?= $sk['no_perk']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">No Polisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="nopol" value="<?= $sk['no_plat']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="posisi" placeholder="Masukan Nama Pelanggan" value="<?= old('nama') ?? $sk['posisi']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control select2">
                                <option value="">--- Pilih Status ---</option>
                                <option value="sedia" <?= $sk['status_ekspedisi'] == 'sedia' ? 'selected' : ''; ?>>Tersedia</option>
                                <option value="tidak tersedia"<?= $sk['status_ekspedisi'] == 'tidak tersedia' ? 'selected' : ''; ?>>Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Supir</label>
                        <div class="col-sm-10">
                            <select name="supir" class="form-control select2">
                                <option value="<?= $sk['kd_driver']; ?>"><?= $sk['nama_supir']; ?></option>
                                <option value="">--- Pilih Supir ---</option>
                                <?php foreach ($supir as $data) : ?>
                                    <option value="<?= $data['kd_supir']; ?>"><?= $data['nama_supir']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-warning">Ubah</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/sk" class="btn btn-block btn-secondary">Batal</a>
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