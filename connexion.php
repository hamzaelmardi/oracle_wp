<?php
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
  <div class="admin-quick-add">
        <input type="text" id ="login" name="login" placeholder="login" required>
        <input type="text" id ="password" name="password" placeholder="password" required>
      <center> <button id ="conx"> se connecter </button> </center>  
      <a href="/wordpress/inscription">Créer votre compte</a>   
     </div>   
  ';
}

add_shortcode('myformshortcodeconx','form_conx_shortcode');
