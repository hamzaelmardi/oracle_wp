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
.hidden{
   visibility:hidden;
}

</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <div class="admin-quick-add">
        <input type="text" id ="login" name="login"  placeholder="nom d\'utilisateur" style="margin-bottom: 5px;" required>
        <label class="hidden" id="loginobli" style="color: #d93025; font-size: 12px;align-items: flex-start;margin-left: 10px">Saisissez votre nom d\'utilisateur</label> 
        <input type="password" id ="password" name="password" placeholder="mot de passe" style="margin-top: 6px;margin-bottom: 5px;" required>
        <label class="hidden" id="passobli" style="color: #d93025; font-size: 12px ;align-items: flex-start;margin-left: 10px">Entrez un mot de passe</label> <br>
        <center> <button class="button button1" id ="conx"> se connecter </button> </center>  <br>
        <a id="myHeader" href="/wordpress/inscription" target="_blank">Créer votre compte fournisseur</a>
        <a id="myHeader" href="/wordpress/inscription-client" target="_blank">Créer votre compte client</a>
     </div>   
  ';
}

add_shortcode('myformshortcodeconx','form_conx_shortcode');
