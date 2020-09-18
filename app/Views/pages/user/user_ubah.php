<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ubah Data User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="/User">Data User</a> </li>
                    <li class="breadcrumb-item active">Ubah Data User</li>
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
                <form action="/User/update" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-lg-2 col-form-label">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" id="id" name="username" value="<?= old('username')?? $user['username']; ?>" required>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id_user']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="text" class="form-control" name="password" placeholder="Masukan Nama User" value="<?= old('password')??$user['password']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">No. Telepon <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <input type="number" min="0" class="form-control" name="telp" placeholder="Masukan No. Telepon" value="<?= old('notel')??$user['telepon']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-lg-2 col-form-label">Level <span class="text-danger">*</span></label>
                        <div class="col-sm-8 col-lg-10">
                            <select name="level" id="" class="form-control">
                                <option value="">--- Pilih Level ---</option>
                                <option value="admin" <?= $user['level'] == 'admin' ?'selected':''; ?>>Admin</option>
                                <option value="manager" <?= $user['level'] == 'manager' ?'selected':''; ?>>Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="submit" class="btn btn-block btn-primary">Update</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="/User" class="btn btn-block btn-secondary">Batal</a>
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