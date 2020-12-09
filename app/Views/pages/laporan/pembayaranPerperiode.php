<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>PEMBAYARAN EKSPEDISI PENGIRIMAN </u></h3>
    </div>
    <!-- <P>Terima : Nama Penerima</P>
    <P>Pembayaran : no so</P> -->
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl. SO</th>
                <th>No. so</th>
                <th>Pelanggan</th>
                <th>Total Pesanan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($bayar as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['created_so']; ?></td>
                    <td><?= $data['no_so']; ?></td>
                    <td><?= $data['nama_pel']; ?></td>
                    <td><?= $data['jumlah_pesanan']; ?></td>
                    <td>Rp <?= number_format($data['jumlah_pesanan'] * $data['harga_so'], 0, ',', '.'); ?></td>
                <tr>
                <?php endforeach; ?>
                <td colspan="6" class="text-right"> Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                </tr>
        </tbody>
    </table>
    <p>Terbilang : <b><?= $terbilang; ?></b></p>
    <div class="float float-right mt-5">
        <div class="text-center fixed-buttom">
            <p>semarang, <?= date('d F Y')?></p>
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