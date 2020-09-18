<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data user</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <div class="card-header">
                <a href="/user/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Telepon</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['username']; ?></td>
                                <td><?= $data['password']; ?></td>
                                <td><?= $data['telepon']; ?></td>
                                <td><?= $data['level']; ?></td>
                                <td>
                                    <a href="/user/edit/<?= $data['id_user']; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                                    <a href="/user/hapus/<?= $data['id_user']; ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>