<?php
/*if(isset($_POST['inscription'])){
  global $wpdb;
 $nom = $_POST['nom'];
 $code = $_POST['code'];
 $login = $_POST['login'];
$password = $_POST['password'];
 $hash = password_hash($password, PASSWORD_DEFAULT);
  if(isset ($_POST['nom'] , $_POST['code'])){
  if($_POST['login'] != '$login' ) {
    $conn = oci_connect('c##hamza','123','localhost/orcl');
    $requete1="select nom,code from FOURNISSEUR";
    $stmt = oci_parse($conn, $requete1);
     oci_execute($stmt);
     oci_fetch_all($stmt,$extract) ;
     
    if(in_array($nom,$extract['NOM']) and in_array($code,$extract['CODE']) ){
       $table_name = $wpdb->prefix . 'fournisseur';     
       $wpdb->insert('fournisseur', array('nom' => $nom, 'code' => $code, 'login' => $login, 'password' => $hash)); 
      $Loc= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 
     header('Location: '.$Loc);
}else {
 $Loc= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  header('Location: '.$Loc);
}
}}}*/
function form_inscription_shortcode() {
 return $var = '
  <div class="admin-quick-add" >
        <input type="text" id ="nom" name="nom" placeholder="nom fournisseur" required>
        <input type="text"  id ="code" name="code" placeholder="code fournisseur" required>
        <input type="text"  id ="login" name="login" placeholder="login" required>
        <input type="text"  id ="password" name="password" placeholder="password" required>
        <center> <button class="button button1" id ="inscription" > inscription </button> </center>
      </div>

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
</style>
     
  ';
}

add_shortcode('myformshortcode','form_inscription_shortcode');
