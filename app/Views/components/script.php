 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="/template/backend/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="/template/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="/template/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="/template/backend/dist/js/adminlte.js"></script>

 <!-- OPTIONAL SCRIPTS -->
 <script src="/template/backend/dist/js/demo.js"></script>

 <!-- InputMask -->
 <script src="/template/backend/plugins/moment/moment.min.js"></script>
 <script src="/template/backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="/template/backend/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
 <script src="/template/backend/plugins/raphael/raphael.min.js"></script>
 <script src="/template/backend/plugins/jquery-mapael/jquery.mapael.min.js"></script>
 <script src="/template/backend/plugins/jquery-mapael/maps/usa_states.min.js"></script>
 <!-- ChartJS -->
 <script src="/template/backend/plugins/chart.js/Chart.min.js"></script>

 <!-- PAGE SCRIPTS -->
 <!-- <script src="/template/backend/dist/js/pages/dashboard2.js"></script> -->
 <!-- DataTables -->
 <script src="/template/backend/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="/template/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="/template/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="/template/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- Select2 -->
 <script src="/template/backend/plugins/select2/js/select2.full.min.js"></script>

 <!-- my script -->
 <!-- <script src="/assets/script/jquery.mask.min.js"></script>
 <script src="/assets/script/terbilang.js"></script>-->
 <!-- <script src="/assets/script/ss.js"></script> -->

 <script>
   $(function() {
     $("#example1").DataTable({
       "responsive": true,
       "autoWidth": false,
     });
     $(".select2").select2({
       theme: 'bootstrap4'
     });
   });
 </script>

 <script type="text/javascript">
   function autofill() {
     var perk = $('#noperk').val();
     $.ajax({
       url: "<?= site_url('/KirimBarang/autofill1') ?>",
       data: "no_perk=" + perk,
       success: function(data) {
         var json = data;
         obj = JSON.parse(json);
         $('#nopol').val(obj.nopol);
         $('#sopir').val(obj.supir);
       }
     });

   };

   function autofill2() {
     var pelanggan = $('#pelanggan').val();
     $.ajax({
       url: "<?= site_url('/KirimBarang/autofill2') ?>",
       data: "kd_pel=" + pelanggan,
       success: function(data) {
         var json = data;
         obj = JSON.parse(json);
         $('#penerima').val(obj.penerima);
         $('#nama').val(obj.penerima);
       }
     });
   }

   function autofill3() {
     var noso = $('#noso').val();
     $.ajax({
       url: "<?= site_url('/BM/autofill3') ?>",
       data: "no_so=" + noso,
       success: function(data) {
         var json = data;
         obj = JSON.parse(json);
         $('#nama').val(obj.nama);
         $('#tgl').val(obj.tgl);
       }
     });
   }

   function cariBySo() {
     var noso = $('#noso').val();

     $.ajax({
       url: "<?= site_url('/bayar/cariBySo') ?>",
       data: "no_so=" + noso,
       success: function(data) {
         var json = data;
         obj = JSON.parse(json);
         $('#pel').val(obj.pelanggan);
         $('#total').val(obj.total);
         $('#terbayar').val(obj.terbayar);
         $('#sisa').val(obj.sisa);
       }
     });
   }

   function kekata(n) {
     var angka = new Array("", " Satu", " Dua", " Tiga", " Empat", " Lima", " Enam", " Tujuh", " Delapan", " Sembilan", " Sepuluh", " Sebelas");
     var tbr;

     if (n < 12) {
       tbr = "" + angka[n]
     } else if (n < 20) {
       tbr = kekata(Math.floor(n - 10)) + " Belas";
     } else if (n < 100) {
       tbr = kekata(Math.floor(n / 10)) + " Puluh" + kekata(n % 10);
     } else if (n < 200) {
       tbr = " Seratus" + kekata(n - 100);
     } else if (n < 1000) {
       tbr = kekata(Math.floor(n / 100)) + " Ratus" + kekata(n % 100);
     }else if (n<2000) {
       tbr = " Seribu"+kekata(n-1000);
     }else if (n<100000) {
       tbr = kekata(Math.floor(n/1000))+" Ribu"+kekata(n%1000);
     }else if (n<1000000000) {
       tbr = kekata(Math.floor(n/1000000))+" Juta"+kekata(n%1000000);
     }else if (n<1000000000000) {
      tbr = kekata(Math.floor(n/1000000000))+" Milyar"+kekata(n%1000000000);
     }else if (n<1000000000000000) {
      tbr = kekata(Math.floor(n/1000000000000))+" Trilyun"+kekata(n%1000000000000);
     }
     return tbr;
   }

   function terbilang(a, b) {
     document.getElementById(b).value = kekata(a.value);
   }
 </script>