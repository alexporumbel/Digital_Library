<script>
  $(function () {
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
      "autoWidth": true,
      "responsive": true,
      "columnDefs": [
      { "width": "100px", "targets": 0 },
      { "width": "20px", "targets": 1 },
      { "width": "100px", "targets": 2 },
      { "width": "70px", "targets": 3 },
      { "width": "70px", "targets": 4 },
      { "width": "100px", "targets": 5 },
      { "width": "100px", "targets": 6 }
    ],
    });
    

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
    
  });
  
  $(document).ready(function() {
      $('.my-checkbox').on('switchChange.bootstrapSwitch', function (event, state) {
          console.log(state);
      }); 
  });
</script>
