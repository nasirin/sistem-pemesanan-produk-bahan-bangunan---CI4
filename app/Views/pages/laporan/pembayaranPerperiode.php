<?= $this->extend('layout/laporan'); ?>

<?= $this->section('content'); ?>
<section class="container mt-3">
    <div class="row">
        <h3 class="m-auto"><u>PEMBAYARAN EKSPEDISI PENGIRIMAN </u></h3>
    </div>
    <P>Terima : Nama Penerima</P>
    <P>Pembayaran : no so</P>
    <table class="table table-bordered mt-3 laporan">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl. Bayar</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>12 agus 2020</td>
                <td>ATM BCA</td>
                <td>12.000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>13 agus 2020</td>
                <td>ATM BCA</td>
                <td>15.000</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">27.000</td>
            </tr>
        </tbody>
    </table>
    <p>Terbilang : <b>bilangan 1 2 3 4 5</b></p>
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