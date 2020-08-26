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
       }
     });
   }
 </script>