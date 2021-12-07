(function($) {
  $(document).ready(function () {
    $('#conx').click( function() {
     
        var login = $('#login').val();
        var pass = $('#password').val();  
        var er = false;
  if ($.trim($('#login').val()).length == 0 ){
      $('#loginobli').removeClass('hidden');
      er = true;
    }else {
      $('#loginobli').addClass('hidden');
    }
  if ($.trim($('#password').val()).length == 0 ){
     $('#passobli').removeClass('hidden');
     er = true;
    }else{
    $('#passobli').addClass('hidden');
     }
  if( er == true){
     return false;
    }
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'load_comments','login': login,'pass': pass},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){

                const role = json.role
                console.log(role)
                if(role.includes("fournisseur")){
              var redirect = window.location.origin+'/wordpress/info'
              window.location.href = redirect
                }
                else if(role.includes("client")){
                    var redirect = window.location.origin+'/wordpress/espace-client' 
              window.location.href = redirect
                }
            }else{
              Swal.fire({
              icon: 'warning',
              text: json.message,
              timer: 3000
             })
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
         if ($.trim($('#nom').val()).length == 0 || $.trim($('#code').val()).length == 0 
          || $.trim($('#login').val()).length == 0 || $.trim($('#password').val()).length == 0
          || $.trim($('#email').val()).length == 0 || $.trim($('#prenom').val()).length == 0
          || $.trim($('#cin').val()).length == 0 || $.trim($('#tel').val()).length == 0)
  {
    alert("champs are empty");
    return false;
  }
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
              Swal.fire({
              icon: 'error',
              text: json.message,
              timer: 3000
             })
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
        var password = $('#password1').val();   
        var registre = $('#registre').val();
        var tel1 = $('#tel1').val();
         if ($.trim($('#raison').val()).length == 0 || $.trim($('#registre').val()).length == 0 
          || $.trim($('#code1').val()).length == 0 || $.trim($('#password1').val()).length == 0
          || $.trim($('#login1').val()).length == 0 || $.trim($('#tel1').val()).length == 0
          )
  {
    alert("champs are empty");
    return false;
  }
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
            Swal.fire({
              icon: 'error',
              text: json.message,
              timer: 3000
             })
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
         if ($.trim($('#rs').val()).length == 0 || $.trim($('#nom2').val()).length == 0 
          || $.trim($('#prenom2').val()).length == 0 || $.trim($('#code2').val()).length == 0
          || $.trim($('#login2').val()).length == 0 || $.trim($('#password').val()).length == 0
          || $.trim($('#email2').val()).length == 0 || $.trim($('#tel2').val()).length == 0)
  {
    alert("champs are empty");
    return false;
  }
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'insert_client','rs': rs,'code2': code2,'nom2': nom2,'prenom2': prenom2,'login2': login2,'password': password,'email2': email2,'tel2': tel2},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
              var redirect = window.location.origin+'/wordpress/connexion'
            window.location.href = redirect
            }else{
              Swal.fire({
              icon: 'error',
              text: json.message,
              timer: 3000
             })
            }
          }
        })});
  });
})(jQuery);


