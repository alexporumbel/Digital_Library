
  $(document).ready(function () {

      var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";  
    $(document).on("click", ".addtofav", function (e) {
         e.preventDefault();
        $.post(baseUrl + "addtofav", {
            pubid: $(this).attr("data-id")
        }).done(function () {
            Swal.fire({
  icon: 'success',
  title: 'Publicatia a fost adaugata la favorite',
  showConfirmButton: true,
  timer: 1500
});
        });
    });
    
        $(document).on("click", ".unfav", function (e) {
         e.preventDefault();
        $.post(baseUrl + "unfav", {
            pubid: $(this).attr("data-id")
        }).done(function () {
            Swal.fire({
  icon: 'success',
  title: 'Publicatia a fost stearsa de la favorite',
  showConfirmButton: true,
  timer: 1500
});
        });
    });
    });