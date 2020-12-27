<!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/admin/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>

<script src="<?= base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/dist/js/adminlte.js'); ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/admin/dist/js/demo.js'); ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/raphael/raphael.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/jquery-mapael/maps/usa_states.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/admin/plugins/chart.js/Chart.min.js'); ?>"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url('assets/admin/dist/js/pages/dashboard2.js'); ?>"></script>
<script src="<?= base_url('assets/admin/plugins/toastr/toastr.min.js'); ?>"></script>

<script>
  $(function () {
       $('.subjects').select2({
           tags: true,
       });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    $('#studs').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    
    $('#unconf').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "columnDefs": [
      { "width": "100px", "targets": 0 },
      { "width": "20px", "targets": 1 },
      { "width": "100px", "targets": 2 },
      { "width": "70px", "targets": 3 },
      { "width": "70px", "targets": 4 },
      { "width": "100px", "targets": 5 },
      { "width": "150px", "targets": 6 }
    ],
    });
    

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
    
  });
  
  $(document).ready(function() {
     
          toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
       var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";
      $('.my-checkbox').on('switchChange.bootstrapSwitch', function (event, state) {
          var studentid = $(this).data("id");
          if(state == true){
             var statex = '1';
          }else{
              var statex = '0';
          }
            $.post(baseUrl + "admin/modifica-status/" + studentid, {
                state: statex
            }).done(function (data) {
                var data = JSON.parse(data);
                if (data['response'] === 'success') {
                    if (state < 1) {
                        toastr.warning("Contul a fost dezactivat!");
                    } else {
                        toastr.success("Contul a fost activat!");
                    }
                }
            });
      }); 
  });
</script>
</body>
</html>