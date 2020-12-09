<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>INVOICE </u></h3>
    </div>
    <P>No. SO : <?= $so['no_so']; ?></P>
    <P>Status SO : <?= $so['status_so']; ?></P>
    <P>Tgl. SO : <?= $so['created_so']; ?></P>
    <P>Pelanggan : <?= $so['nama_pel']; ?></P>
    <P>Total : Rp. <?= number_format($so['harga_so'], 0, ',', '.') ?></P>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>No. SJ</th>
                <th>No. Plat</th>
                <th>Jurusan</th>
                <th>Tgl. Muat</th>
                <th>Tgl. Bongkar</th>
                <th>Muatan</th>
                <th>Berat</th>
                <th>Harga / ton</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($invoicesj as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_sj']; ?></td>
                    <td><?= $data['no_plat']; ?></td>
                    <td><?= ucfirst($data['jurusan']); ?></td>
                    <td><?= date('d M Y', strtotime($data['created_sj'])); ?></td>
                    <td><?= date('d M Y', strtotime($data['created_tiba'])); ?></td>
                    <td><?= ucfirst($data['muatan']); ?></td>
                    <td><?= $data['terkirim']; ?></td>
                    <td>Rp. <?= number_format($data['harga_so'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Terbilang : <b><?= $terbilang; ?></b></p>
    <div class="container mt-5">
        <div class="float float-left">
            <div class="text-center">
                <p>semarang, 07 agustus 2020</p>
                <p><b>CV SAMUDERA KARYA USAHA</b></p>
                <br><br>
                <p><b><u>ENNY HARDIANTY</u></b></p>
                <p>keuangan</p>
            </div>
        </div>
        <div class="float float-right">
            <div class="text-center">
                <p>semarang, 07 agustus 2020</p>
                <p><b>CV SAMUDERA KARYA USAHA</b></p>
                <br><br>
                <p><b><u>ENNY HARDIANTY</u></b></p>
                <p>keuangan</p>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
<?= $this->endSection(); ?>