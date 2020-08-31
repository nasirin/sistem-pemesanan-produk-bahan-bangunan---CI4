<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>LAPORAN DAFTAR SUPIR</u></h3>
    </div>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Supir</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supir as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['kd_supir']; ?></td>
                    <td><?= ucfirst($data['nama_supir']); ?></td>
                    <td><?= ucfirst($data['jln_supir'] . ' No.' . $data['no_jln_supir'] . ' ' . $data['kota_supir']); ?></td>
                    <td><?= $data['notelp_supir']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>