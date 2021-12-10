<?php
function form_inscription_client_shortcode() {
 return $var = '
 <html >
 <head>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 </head>
 <style>
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
  <h1>Espace inscription client </h1> 
  <div class="admin-quick-add" >
   
        <input type="text" id ="rs" name="rs" placeholder="RS" required>
         <label  class="rs" id="label">Saisissez votre rs</label> 
        <input type="text" id ="nom2" name="nom2" placeholder="nom" required>
         <label  class="nom2" id="label">Saisissez votre nom</label> 
        <input type="text" id ="prenom2" name="prenom2" placeholder="prenom" required>
         <label  class="prenom2" id="label">Saisissez votre prenom</label> 
        <input type="text"  id ="code2" name="code2" placeholder="code client SNTL" required>
         <label  class="code2" id="label">Saisissez votre code client SNTL</label> 
        <div class="input-group mb-0">
             <input type="text"  id ="email2" name="email2" placeholder="adresse email" style="width: 350px;"required >
        <div class="input-group-append" style="height: 49px;position: absolute;right: 0;top: 8px;">
             <span class="input-group-text">example@example.com</span>
        </div>
        </div>
         <label  class="email2" id="label">Saisissez votre adresse email</label> 
        <div class="input-group">
            <div class="input-group-prepend position_icon_fr" style="height: 45px;">
            <span class="input-group-text" id="basic-addon4" style="height: 41px;position: absolute;left: 0;top: 0px;width: 69px;">+212</i></span>
            </div>
            <input type="tel" id ="tel2" name="tel2" placeholder="telephone" style="width: 40%;right: 261px;position: absolute;top: 1px;height: 39px;"/>
        </div>
         <label  class="tel2" id="label">Saisissez votre numero de telephone</label> 
        <input type="text"  id ="login2" name="login2" placeholder="login" required>
         <label  class="login2" id="label">Saisissez votre login</label> 
        <input type="text"  id ="password" name="password" placeholder="password" required>
         <label  class="password2" id="label">Saisissez votre password</label> 
        <center> <button class="button button1" id ="inscriptioncli" > inscription </button> </center>
      </body>
      </html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  ';
}

add_shortcode('myformshortcodecli','form_inscription_client_shortcode');