<?php
session_start();
include('index.php');
function form_conx_shortcode() {
 return $var = '
 <style>
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
#myHeader {
  background-color: white;
  color: black;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
   border: 1px solid #634caf;
}
#label {
 color: #d93025; font-size: 12px;align-items: flex-start;margin-left: 10px;display:none;margin-top: -6px
}

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <div class="admin-quick-add">
        <input type="text" id ="login" name="login"  placeholder="nom d\'utilisateur" style="margin-top: 7px"required>
        <label class="login" id="label">Saisissez votre nom d\'utilisateur</label> 
        <input type="password" id ="password" name="password" placeholder="mot de passe"   style="margin-top: 7px" required>
        <label class="password" id="label" >Entrez un mot de passe</label> <br>
        <center> <button  class="button button1" id ="conx"> se connecter </button> </center>  <br>
    <center>    <a id="myHeader" href="/wordpress/inscription" target="_blank">Créer votre compte fournisseur</a>
        <a id="myHeader" href="/wordpress/inscription-client" target="_blank">Créer votre compte client</a> </center>
     </div>
  ';
}

add_shortcode('myformshortcodeconx','form_conx_shortcode');
