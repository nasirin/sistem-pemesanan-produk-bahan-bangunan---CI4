<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Bongkar Muat Detail</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Bongkar Muat Detail</li>
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
                <a href="/BM/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NO. SJ</th>
                            <th>TGL. SJ</th>
                            <th>TGL. Tiba</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sj as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['no_sj']; ?></td>
                                <td><?= date('d M Y', strtotime($data['created_sj'])); ?></td>
                                <td><?= $data['created_tiba']; ?></td>
                                <td>
                                    <form action="/BM/ubah" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" value="<?= $data['no_sj']; ?>" name="nosj">
                                        <input type="hidden" value="<?= $data['no_so']; ?>" name="noso">
                                        <button type="submit" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></button>
                                    </form>
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