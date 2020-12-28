  $(document).ready(function () {
      var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";
      $(document).on('click', '.register_btn', function (e) {
          e.preventDefault();
       $('.login').hide();
                $('.register').show();
    });
      $(document).on('click', '.back_btn', function (e) {
          e.preventDefault();
                $('.register').hide();
                $('.forget').hide();
       $('.login').show();
    });
    $(document).on('click', '.forgot', function (e) {
          e.preventDefault();
       $('.login').hide();
       $('.register').hide();
                $('.forget').show();
    });
    
    $(document).on("click", ".registers_btn", function (e) {
         e.preventDefault();
        $.post(baseUrl + "inregistrare", {
            nume: $('input[name="nume"]').val(),
            initiala: $('input[name="initiala"]').val(),
            prenume: $('input[name="prenume"]').val(),
            facultate: $('select[name="facultate"]').val(),
            an: $('select[name="an"]').val(),
            email: $('input[name="email"]').val(),
            parola: $('input[name="parola"]').val()
        }).done(function () {
            $('.login-forgot').show();
            $('.login-signin-password').hide();
        });
    });
    
  });