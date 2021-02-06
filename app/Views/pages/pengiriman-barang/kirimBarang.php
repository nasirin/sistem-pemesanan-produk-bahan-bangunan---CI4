<?= $this->extend('layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pengiriman Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Pengiriman Barang</li>
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
                <a href="/kirim/tambah" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah</a>
                <a href="#cetakSO" data-toggle="modal" class="btn btn-secondary"> <i class="fa fa-print"></i> Print</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tgl Sj</th>
                            <th>No Perk</th>
                            <th>Jurusan</th>
                            <th>Penerima</th>
                            <th>Barang</th>
                            <th>Jml Pesanan</th>
                            <th>Harga <small>/ton</small></th>
                            <th>No Pol</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($sj as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d M Y', strtotime($data['created_so'])); ?></td>
                                <td><?= $data['no_perk']; ?></td>
                                <td><?= ucwords($data['jurusan']); ?></td>
                                <td><?= $data['nama_pel']; ?></td>
                                <td><?= ucwords($data['muatan']); ?></td>
                                <td><?= $data['jumlah_pesanan']; ?></td>
                                <td>Rp.<?= number_format($data['harga_so'], 0, ',', '.'); ?></td>
                                <td><?= $data['no_plat']; ?></td>
                                <td>
                                    <a href="/kirim/ubah/<?= $data['no_so'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="/kirim/hapus/<?= $data['no_so'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->include('components/modal-print'); ?>
<?= $this->endSection(); ?>