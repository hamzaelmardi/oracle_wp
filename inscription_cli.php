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
</style>
<body>
  <h1>Espace inscription client </h1> 
  <div class="admin-quick-add" >
   
        <input type="text" id ="rs" name="rs" placeholder="RS" required>
        <input type="text" id ="nom2" name="nom2" placeholder="nom" required>
        <input type="text" id ="prenom2" name="prenom2" placeholder="prenom" required>
        <input type="text"  id ="code2" name="code2" placeholder="code client SNTL" required>
        <div class="input-group mb-3">
             <input type="text"  id ="email2" name="email2" placeholder="adresse email" style="width: 350px;"required >
        <div class="input-group-append" style="height: 49px;position: absolute;right: 0;top: 8px;">
             <span class="input-group-text">example@example.com</span>
        </div>
        </div>
        <div class="input-group">
            <div class="input-group-prepend position_icon_fr" style="height: 45px;">
            <span class="input-group-text" id="basic-addon4" style="height: 46px;position: absolute;left: 0;top: -1px;width: 65px;">+212</i></span>
            </div>
            <input type="tel" id ="tel2" name="tel2" placeholder="telephone" style="width: 88%;right: 0;position: absolute;"/>
        </div>
        <input type="text"  id ="login2" name="login2" placeholder="login" required>
        <input type="text"  id ="password" name="password" placeholder="password" required>
        <center> <button class="button button1" id ="inscriptioncli" > inscription </button> </center>
      
      </body>
      </html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  
  ';
}

add_shortcode('myformshortcodecli','form_inscription_client_shortcode');