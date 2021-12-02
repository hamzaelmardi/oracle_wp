<?php
session_start();
include('index.php');
function form_conxcli_shortcode() {
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
</style>
  <div class="admin-quick-add">
        <input type="text" id ="login2" name="login2"  placeholder="login" required>
        <input type="password" id ="password" name="password" placeholder="password" required>
        <center> <button class="button button1" id ="conxcli"> se connecter </button> </center>  
        <a id="myHeader" href="/wordpress/inscription-client" target="_blank">Créer votre compte</a>
     </div>   
  ';
}

add_shortcode('myformshortcodeconxcli','form_conxcli_shortcode');