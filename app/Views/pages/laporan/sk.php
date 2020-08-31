<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>LAPORAN DAFTAR STATUS KENDARAAN</u></h3>
    </div>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Perk</th>
                <th>No. Plat</th>
                <th>Status</th>
                <th>Posisi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sk as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_perk']; ?></td>
                    <td><?= $data['no_plat']; ?></td>
                    <td><?= $data['status_ekspedisi']; ?></td>
                    <td><?= ucfirst($data['posisi']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>