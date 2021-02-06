<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>LAPORAN DAFTAR PELANGGAN</u></h3>
    </div>
    <table class="table table-bordered mt-3 laporan table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th>Contact Person</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pelanggan as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= ucwords($data['nama_pel']); ?></td>
                    <td><?= ucwords($data['jln_pel']) . ' No.' . $data['no_jln_pel'] . ' ' . $data['kota_pel']; ?></td>
                    <td><?= $data['notelp_pel']; ?></td>
                    <td><?= ucfirst($data['cp_pel']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>