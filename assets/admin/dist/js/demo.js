/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */
(function ($) {
  'use strict'
if($('.custom-file-input').length > 0){
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("pubFile").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
});
}
$(document).on('click', '.upload-respfile', function (e) {
          e.preventDefault();
$('#respfile').trigger('click'); 
});

if($('.upload-respfile').length > 0){
document.querySelector('.custom-file-inputr').addEventListener('change',function(e){
  $('.upload-respfile').html('Fisier incarcat');
});
}

    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Astazi'       : [moment(), moment()],
          'Ieri'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Saptamana curenta' : [moment().subtract(6, 'days'), moment()],
          'Ultimele 30 de zile': [moment().subtract(29, 'days'), moment()],
          'Luna curenta'  : [moment().startOf('month'), moment().endOf('month')],
          'Luna precedenta'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    );

  $('.subjects').select2({
           tags: true,
       });

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    
    $('#topviews').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
    });
    
    $('#topfavs').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
    });
    
    $('#topdownloads').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
    });
    
    $('#toptime').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
    });
    
    $('#studs').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
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
})(jQuery)
