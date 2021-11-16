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
        <center> <button id ="inscription" > inscription </button> </center>
      </div>
     
  ';
}

add_shortcode('myformshortcode','form_inscription_shortcode');
