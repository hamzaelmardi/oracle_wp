(function($) {
  $(document).ready(function () {
    $('#conx').click( function() {
        var login = $('#login').val();
        var pass = $('#password').val();  
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'load_comments','login': login,'pass': pass,},
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
        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {'action': 'insert_fourn','nom': nom,'code': code,'login': login,'password': password,},
          success:function(result){
            var json = JSON.parse(result);
              if(json.code1==200){
                alert(json.message);
               document.querySelector('.admin-quick-add [name="nom"]').value = '';
               document.querySelector('.admin-quick-add [name="password"]').value = '';
                document.querySelector('.admin-quick-add [name="code"]').value = '';
               document.querySelector('.admin-quick-add [name="login"]').value = '';
            }else{
              alert(json.message);
            }
          }
        })});
  });
})(jQuery);
