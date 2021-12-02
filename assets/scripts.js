(function($) {
  $(document).ready(function () {
    $('#tab').DataTable()
    $('#conx').click( function() {
        var login = $('#login').val();
        var pass = $('#password').val();  
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'load_comments','login': login,'pass': pass},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
              var redirect = window.location.origin+'/wordpress/info'
             window.location.href = redirect
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);

(function($) {
  $(document).ready(function () {
    $('#inscription').click( function() {
        var nom = $('#nom').val();
        var code = $('#code').val();
        var login = $('#login').val();
        var password = $('#password').val();
        var email = $('#email').val();   
        var prenom = $('#prenom').val();   
        var cin = $('#cin').val();
        var tel = $('#tel').val();
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'insert_fourn','nom': nom,'code': code,'login': login,'password': password,'email': email,'prenom': prenom,'cin': cin,'tel': tel},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
                var redirect = window.location.origin+'/wordpress/connexion'
             window.location.href = redirect
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);

(function($) {
  $(document).ready(function () {
    $('#inscription1').click( function() {
        var raison = $('#raison').val();
        var code1 = $('#code1').val();
        var login1 = $('#login1').val();
        var password = $('#password').val();   
        var registre = $('#registre').val();
        var tel1 = $('#tel1').val();
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'insert_morale','raison': raison,'code1': code1,'login1': login1,'password': password,'registre': registre,'tel1': tel1},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
                var redirect = window.location.origin+'/wordpress/connexion'
             window.location.href = redirect
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);

(function($) {
  $(document).ready(function () {
    $('#inscriptioncli').click( function() {
        var rs = $('#rs').val();
        var nom2 = $('#nom2').val();
        var prenom2 = $('#prenom2').val();
        var code2 = $('#code2').val();
        var login2 = $('#login2').val();
        var password = $('#password').val();   
        var email2 = $('#email2').val();
        var tel2 = $('#tel2').val();
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'insert_client','rs': rs,'code2': code2,'nom2': nom2,'prenom2': prenom2,'login2': login2,'password': password,'email2': email2,'tel2': tel2},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
              var redirect = window.location.origin+'/wordpress/connexion-client'
            window.location.href = redirect
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);


(function($) {
  $(document).ready(function () {
    $('#conxcli').click( function() {
        var login2 = $('#login2').val();
        var pass = $('#password').val();  
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'connexion_client','login2': login2,'pass': pass,},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
               alert(json.message);
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);