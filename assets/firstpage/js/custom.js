  $(document).ready(function () {
      var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";
      $(document).on('click', '.login_btn', function (e) {
          if(($('input[name="email"]').val() === '') || ($('input[name="password"]').val() === '')){
              e.preventDefault();
              $('.error-message').html('<center><font color="red"><b>Datele de logare nu sunt valide</b></font></center>');
              $('.error-message').show();
          }else{
              $('.error-message').hide();
          }
    });
      $(document).on('click', '.register_btn', function (e) {
          e.preventDefault();
       $('.login').hide();
       $('.error-message').hide();
                $('.register').show();
    });
      $(document).on('click', '.back_btn', function (e) {
          e.preventDefault();
                $('.register').hide();
                $('.error-message').hide();
                $('.forget').hide();
       $('.login').show();
    });
    $(document).on('click', '.forgot', function (e) {
          e.preventDefault();
       $('.login').hide();
       $('.error-message').hide();
       $('.register').hide();
                $('.forget').show();
    });
    
    $(document).on("click", ".registers_btn", function (e) {
        e.preventDefault();
        if(($('input[name="nume"]').val() === '') || ($('input[name="initiala"]').val() === '') || ($('input[name="prenume"]').val() === '')
                || ($('select[name="facultate"]').val() === '')|| ($('select[name="an"]').val() === '')|| ($('input[name="emailr"]').val() === '')
                || ($('input[name="parola"]').val() === '')){
           
         $('.error-message').html('<center><font color="red"><b>Completeaza toate campurile formularului!</b></font></center>');
         $('.error-message').show();
     }else{
         $('.error-message').hide();
        $.post(baseUrl + "inregistrare", {
            nume: $('input[name="nume"]').val(),
            initiala: $('input[name="initiala"]').val(),
            prenume: $('input[name="prenume"]').val(),
            facultate: $('select[name="facultate"]').val(),
            an: $('select[name="an"]').val(),
            email: $('input[name="emailr"]').val(),
            parola: $('input[name="parola"]').val()
        }).done(function () {
             $('.register').hide();
             $('.card-footer').hide();
            $('.register-msg').show();
        });
    }
    });
    
          $(document).on('click', '.forget_btn', function (e) {
              e.preventDefault();
          if($('input[name="emailf"]').val() === ''){
              $('.error-message').html('<center><font color="red"><b>Te rugam introdu adresa de email</b></font></center>');
              $('.error-message').show();
          }else{
              $('.error-message').hide();
              $.post(baseUrl + "forget", {
            email: $('input[name="emailr"]').val()
        }).done(function () {
             $('.forget').hide();
             $('.card-footer').hide();
            $('.forgot-msg').show();
        });
          }
    });
    
  });