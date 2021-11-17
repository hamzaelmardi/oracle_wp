<?php
session_start();
include('index.php');
/*
if(isset($_POST['conx'])){
  global $wpdb;
 $login = $_POST['login'];
 $password = $_POST['password'];
 $db = new PDO('mysql:dbname=wordpress;host=127.0.0.1', 'root', '');

  $sql= "SELECT * FROM fournisseur WHERE login = '$login'";
  $result = $db->prepare($sql);
  $result->execute();

  if( $result->rowcount() > 0){
    $user= $result->fetch();
  if(password_verify($password, $user['password'])){

header('Location:  wordpress/info');  
}else {
 echo  "Le nom d'utilisateur ou le mot de passe est incorrect.";
}}
}
*/
function form_conx_shortcode() {
 return $var = '
 <style>
.button {
  border: none;
  color: white;
  padding: 6px 3px;
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
  <div class="admin-quick-add">
        <input type="text" id ="login" name="login"  placeholder="login" required>
        <input type="password" id ="password" name="password" placeholder="password" required>
      <center> <button class="button button1" id ="conx"> se connecter </button> </center>  
      <a href="/wordpress/inscription">Créer votre compte</a>
     </div>   
  ';
}

add_shortcode('myformshortcodeconx','form_conx_shortcode');
