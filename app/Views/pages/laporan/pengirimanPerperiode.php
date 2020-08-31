<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>PEMBAYARAN EKSPEDISI PENGIRIMAN </u></h3>
    </div>
    <P>No. SO : no so</P>
    <P>Tgl. SO : 12 agust 2020</P>
    <P>Pelanggan : nama pelanggan</P>
    <P>Angkutan : Spun pile diameter 60 dari semarang ke surabaya</P>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>No. SJ</th>
                <th>No. Plat</th>
                <th>Jurusan</th>
                <th>Tgl. SJ</th>
                <th>Muatan</th>
                <th>Berat</th>
                <th>Harga / ton</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>12 agus 2020</td>
                <td>ab 123 cd</td>
                <td>Semarang</td>
                <td>12 agus 2020</td>
                <td> Cengkeh</td>
                <td>12</td>
                <td>22.000</td>
                <td>22.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>12 agus 2020</td>
                <td>ab 123 cd</td>
                <td>Semarang</td>
                <td>12 agus 2020</td>
                <td> Cengkeh</td>
                <td>12</td>
                <td>22.000</td>
                <td>22.000</td>
            </tr>
            <tr>
                <td colspan="9" class="text-right">44.000</td>
            </tr>
        </tbody>
    </table>
    <p>Terbilang : <b>bilangan 1 2 3 4 5</b></p>
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