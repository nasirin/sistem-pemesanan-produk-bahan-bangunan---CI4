<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>LAPORAN EKSPEDISI PENGIRIMAN </u></h3>
    </div>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>No. SO</th>
                <th>No. SJ</th>
                <th>Pelanggan</th>
                <th>No. Plat</th>
                <th>Jurusan</th>
                <th>Tgl. SJ</th>
                <th>Tgl. SO</th>
                <th>Muatan</th>
                <th>Tujuan</th>
                <th>Berat</th>
                <th>Harga / ton</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($laporan as $data) : ?>
                
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_so'] ?></td>
                    <td><?= $data['no_sj']; ?></td>
                    <td><?= ucwords($data['nama_pel']); ?></td>
                    <td><?= $data['no_plat']; ?></td>
                    <td><?= ucfirst($data['posisi']); ?></td>
                    <td><?= date('d M Y', strtotime($data['created_sj'])); ?></td>
                    <td><?= date('d M Y', strtotime($data['created_so'])); ?></td>
                    <td><?= ucfirst($data['muatan']); ?></td>
                    <td><?= ucfirst($data['kota_pel']); ?></td>
                    <td><?= number_format($data['jumlah_pesanan'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($data['harga_so'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($data['harga_so'] * $data['jumlah_pesanan'], 0, ',', '.'); ?></td>

                </tr>
                <tr>
                </tr>
            <?php endforeach; ?>
            <td colspan="13" class="text-right" id="total">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
        </tbody>
    </table>
    <!-- <p>Terbilang : <b>bilangan 1 2 3 4 5</b></p> -->

    <p>Terbilang : <b><?= $terbilang; ?></b></p>
    <div class="container mt-5">
        <div class="float float-left">
            <div class="text-center">
                <p>semarang, <?= date('d F Y')?></p>
                <p><b>CV SAMUDERA KARYA USAHA</b></p>
                <br><br>
                <p><b><u>ENNY HARDIANTY</u></b></p>
                <p>keuangan</p>
            </div>
        </div>
        <div class="float float-right">
            <div class="text-center">
                <p>semarang, <?= date('d F Y')?></p>
                <p><b>CV SAMUDERA KARYA USAHA</b></p>
                <br><br>
                <p><b><u>ENNY HARDIANTY</u></b></p>
                <p>keuangan</p>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function terbilang(a, b) {
        document.getElementById(b).innerHTML = kekata(a.value);
        // document.getElementById(b).value = kekata(a.value);
    }
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>