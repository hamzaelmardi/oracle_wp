<?php
function form_inscription_shortcode() {
 return $var = '
 <html >
 <head>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 </head>
 <style>
form .error {
  color: #ff0000;
}
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.button {
  border: none;
  color: white;
  padding: 6px 6px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #634caf;
}
.button1:hover {
  background-color: #634caf;
  color: white;
}
#label {
 color: #d93025; font-size: 12px;align-items: flex-start;margin-left: 10px;display:none;margin-top: -6px
}
</style>
<body>
  <h1>Espace inscription partenaire </h1> 
  <!-- <div class="admin-quick-add" > -->
   <select  id="source" >
   <option value="" selected disabled>select</option>
   <option value="Personnephysique">Personne physique</option>
  <option value="Personnemoral">Personne morale</option>
</select >
     <div name="Personnephysique" id="Personnephysique" style="display:none">
        <input type="text" id ="nom" name="nom" placeholder="nom" required>
        <label class="nom" id="label" >Saisissez votre nom </label> 
        <input type="text" id ="prenom" name="prenom" placeholder="prenom" required>
        <label class="prenom" id="label">Saisissez votre prenom </label> 
        <input type="text" id ="cin" name="cin" placeholder="cin" required>
         <label class="cin" id="label">Saisissez votre cin </label> 
        <input type="text"  id ="code" name="code" placeholder="code fournisseur SNTL" required>
        <label  class="code" id="label">Saisissez votre code fournisseur sntl </label> 
        <div class="input-group mb-0">
             <input type="text"  id ="email" name="email" placeholder="adresse email" style="width: 384px;"required >
        <div class="input-group-append" style="height: 50px;position: absolute;right: 0;top: 8px;">
             <span class="input-group-text">example@example.com</span>
        </div>
        </div>
        <label class="email" id="label">Saisissez votre adresse email</label>
        <div class="input-group mb-0">
            <div class="input-group-prepend position_icon_fr" style="height: 45px;">
            <span class="input-group-text" id="basic-addon4" style="height: 40px;position: absolute;left: 0;top: 1px;width: 69px;">+212</i></span>
            </div>
            <input type="tel" id ="tel" name="tel" placeholder="telephone" style="width: 43%;right: 261px;position: absolute;top: 1px;height: 40px;"/>
        </div>
        <label class="tel" id="label">Saisissez votre numero de telephone</label>
        <input type="text"  id ="login" name="login" placeholder="login" required>
        <label  class="login" id="label">Saisissez votre login</label> 
        <input type="text"  id ="password" name="password" placeholder="password" required>
        <label class="password" id="label">Saisissez votre password</label> 
        <center> <button class="button button1" id ="inscription" > inscription </button> </center>
      </div>
       <div name="Personnemoral" id="Personnemoral" style="display:none">
        <input type="text"  id ="raison" name="raison" placeholder="Raison sociale" required>
         <label class="raison" id="label" >Saisissez votre raison social </label> 
        <input type="text"  id ="code1" name="code1" placeholder="code fournisseur SNTL" required>
         <label class="code1" id="label" >Saisissez votre code fournisseur sntl </label> 
        <input type="text"  id ="registre" name="registre" placeholder="Registre de commerce Mail" required>
        <label class="registre" id="label" >Saisissez votre Registre de commerce Mail </label> 
        <div class="input-group">
            <div class="input-group-prepend position_icon_fr" style="height: 45px;">
            <span class="input-group-text" id="basic-addon4" style="height: 40px;position: absolute;left: 0;top: 1px;width: 69px;">+212</i></span>
            </div>
            <input type="tel" id ="tel1" name="tel1" placeholder="telephone" style="width: 43%;right: 261px;position: absolute;top: 1px;height: 40px;"/>
        </div>
        <label class="tel1" id="label" >Saisissez votre numero de telephone </label>
        <input type="text"  id ="login1" name="login1" placeholder="login" required>
        <label class="login1" id="label" >Saisissez votre login </label>
        <input type="text"  id ="password1" name="password1" placeholder="password" required>
        <label class="password1" id="label" >Saisissez votre password </label>
        <center> <button class="button button1" id ="inscription1" > inscription </button> </center>
      </div>
      </body>
      </html>
      
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js"></script>
    <script>
    $(document).ready(function(){
    var bindClickToToggle = function(element){
        element.click(function(){
            $(this).parents(".dropdown").find("dd ul").toggle();
        });
    };
    $("#source").change(function () {
        if ($("#source option:selected").text() == "Personne physique"){
            $("#Personnemoral").hide();
            $("#Personnephysique").show();
        } else if ($("#source option:selected").text() == "Personne morale"){
            $("#Personnephysique").hide();
            $("#Personnemoral").show();
        } });
});
</script>
  
  ';
}

add_shortcode('myformshortcode','form_inscription_shortcode');
