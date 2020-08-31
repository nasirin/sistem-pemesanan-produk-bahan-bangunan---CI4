<?= $this->include('components/meta'); ?>

<body>
    <!-- header -->
    <section class="container header">
        <div class="row">
            <div>
                <img src="/assets/logo/default-logo.png" width="100" alt="">
            </div>
            <div class="align-self-center ml-2">
                <h1>CV. SAMUDERA KARYA USAHA</h1>
                <h4>TRANSPORTASI, RENTAL ALAT BERAT, SUPPLIER, KONSTRUKSI, PENGURUKAN</h4>
            </div>
        </div>
        <div class="double"></div>
    </section>

    <!-- content -->
    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <section class="container foter fixed-bottom">
        <div class="row ml-2">
            <p><b>BANK MANDIRI - BNI - BCA</b></p>
        </div>
        <div class="bsolid"></div>
        <div class="row ml-2 mt-2">
            <div>
                <p><b>Head Office :</b></p>
            </div>
            <div class="ml-2">
                <p>Puri Bima Sakti Cluster Gang 5 / No. 4 Pandean Lamper - Gayamsari - Semarang <br> Telp: 024 - 767 455 86 Fax : 024 - 767 455 87 </p>
            </div>
        </div>
    </section>

    <?= $this->include('components/script'); ?>
</body>

</html>