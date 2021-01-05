  var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";  
    function activityWatcher(){
    var running = false;
    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
        if(running === false){
             running= true;
        setTimeout(function(){
            $.post(baseUrl + "log", {
        }).done(function () {
        running = false;
        });

    }, 10000);
        }
       
        
    }

    //An array of DOM events that should be interpreted as
    //user activity.
    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];

    //add these events to the document.
    //register the activity function as the listener parameter.
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });


}

  $(document).ready(function () {


activityWatcher();
    
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
        $(document).on("click", ".sendquery", function (e) {
         e.preventDefault();
         $('#exampleModal').modal('toggle');
        $.post(baseUrl + "trimitesolicitare", {
            subiect: $('input[name="subiect"]').val(),
            mesaj: $('textarea[name="mesaj"]').val()
        }).done(function () {
            $('input[name="subiect"]').val('');
            $('textarea[name="mesaj"]').val('');
            Swal.fire({
  icon: 'success',
  title: 'Solicitarea a fost trimisa',
  showConfirmButton: true,
  timer: 1500
});
        });
    });
    });
    