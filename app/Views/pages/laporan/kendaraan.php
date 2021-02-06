<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>LAPORAN DAFTAR KENDARAAN</u></h3>
    </div>
    <table class="table table-bordered mt-3 laporan table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Perk</th>
                <th>No. Plat</th>
                <th>Jenis Kendaraan</th>
                <th>Tonase</th>
                <th>Volume</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kendaraan as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_perk']; ?></td>
                    <td><?= $data['no_plat']; ?></td>
                    <td><?= ucfirst($data['jenis']); ?></td>

                    <td><?= $data['tonase']; ?></td>
                    <td><?= $data['volume']; ?></td>
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