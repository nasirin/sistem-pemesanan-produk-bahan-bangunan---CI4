<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>PEMBAYARAN EKSPEDISI PENGIRIMAN </u></h3>
    </div>
    <P>Penerima : <?= ucfirst($nama); ?></P>
    <P>Pembayaran : <?= $noso; ?></P>
    <table class="table table-bordered mt-3 laporan table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl. Bayar</th>
                <th>Keterangan</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($invoice as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['created_bayar']; ?></td>
                    <td><?= $data['keterangan']; ?></td>
                    <td>Rp. <?= number_format($data['terbayar'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="text-right">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
    <p>Terbilang : <b><?= $terbilang; ?></b></p>
    <div class="float float-right mt-5">
        <div class="text-center fixed-buttom">
            <p>semarang, 07 agustus 2020</p>
            <p><b>CV SAMUDERA KARYA USAHA</b></p>
            <br><br>
            <p><b><u>ENNY HARDIANTY</u></b></p>
            <p>keuangan</p>
        </div>
    </div>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>