$(document).ready(function () {
    var getUrl = window.location;
    var curUrl = window.location.href;
    var baseUrl = getUrl.protocol + "//" + getUrl.host + "/Digital_Library/";
    function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
    if (curUrl.indexOf("reset") > 1) {
        $('.login').hide();
        $('.register').hide();
        $('.forgot').hide();
        $('.change-password').show();
        $(document).on('click', '.back_btn', function (e) {
            e.preventDefault();
            location.replace(baseUrl);
        });
        $(document).on("click", ".changepass-btn", function (e) {
            e.preventDefault();
            if (($('input[name="passf"]').val() !== $('input[name="passl"]').val())) {
                 $('.rst-error').show();
            } else {
                $('.rst-error').hide();
                $.post(baseUrl + "reset", {
                    token: getUrlParameter('reset'),
                    password: $('input[name="passf"]').val()
                }).done(function () {
                   location.replace(baseUrl + '?rstdone');
                });
            }
        });
        
    } else {
        if (curUrl.indexOf("rstdone") > 1) {
            $('.rst-message').show();
    }
        $(document).on('click', '.login_btn', function (e) {
            if (($('input[name="email"]').val() === '') || ($('input[name="password"]').val() === '')) {
                e.preventDefault();
                $('.error-message').html('<center><font color="red"><b>Datele de logare nu sunt valide</b></font></center>');
                $('.error-message').show();
            } else {
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
            if (($('input[name="nume"]').val() === '') || ($('input[name="initiala"]').val() === '') || ($('input[name="prenume"]').val() === '')
                    || ($('select[name="facultate"]').val() === '') || ($('select[name="an"]').val() === '') || ($('input[name="emailr"]').val() === '')
                    || ($('input[name="parola"]').val() === '')) {

                $('.error-message').html('<center><font color="red"><b>Completeaza toate campurile formularului!</b></font></center>');
                $('.error-message').show();
            } else {
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
            if ($('input[name="emailf"]').val() === '') {
                $('.error-message').html('<center><font color="red"><b>Te rugam introdu adresa de email</b></font></center>');
                $('.error-message').show();
            } else {
                $('.error-message').hide();
                $.post(baseUrl + "forget", {
                    email: $('input[name="emailf"]').val()
                }).done(function () {
                    $('.forget').hide();
                    $('.card-footer').hide();
                    $('.forgot-msg').show();
                });
            }
        });
    }
});