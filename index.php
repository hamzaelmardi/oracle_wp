<?php
/*
Plugin Name: Plugin test_oracle
Description: test test
*/
/**
 *  
 */
 require_once(ABSPATH. WPINC .'/class-phpass.php');
function WordPress_resources() {
    
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('main_js', plugin_dir_url( __FILE__ ) . '/assets/main.js', NULL, 1.0, true);

    wp_localize_script('main_js', 'magicalData', array(
        'nonce' => wp_create_nonce('wp_rest'),
        'siteURL' => get_site_url()
    ));
    require_once('oracle.php');
    require_once('inscription.php');
    require_once('connexion.php');
    require_once('info.php');
    require_once('inscription_cli.php');
    require_once('client.php');
   
}
add_action('wp_enqueue_scripts', 'WordPress_resources');

//get
function handle_get_all($data) {
    global $wpdb;
    $query = "SELECT * FROM `fournisseur`";
    $list = $wpdb->get_results($query);
    return $list;
}

add_action( 'init', function () {
  register_rest_route( 'wp/v2', '/fournisseur', array(
    'methods' => 'GET',
    'callback' => 'handle_get_all',
  ));
});

//post
function post_all(WP_REST_Request $request) {
    global $wpdb;
    $item = $request->get_json_params();
    $fields = array();
    $values = array();
    foreach($item as $key => $val) {
        array_push($fields, preg_replace("/[^A-Za-z0-9]/", '', $key));
        array_push($values, $wpdb->prepare('%s', $val));
    }
    $fields = implode(", ", $fields);
    $values = implode(", ", $values);
$conn = oci_connect('c##hamza','123','localhost/orcl');
$requete1="select nom from FOURNISSEUR";
$stmt = oci_parse($conn, $requete1);
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $results);
for ($i = 0; $i < $nrows; $i++) {
foreach ($results as $data) {
if(in_array($data[1], $values)){
$query = "INSERT into fournisseur($fields) values($values)";
    $list = $wpdb->get_results($query);
    return $list;
}
}
}
}

add_action( 'init', function () {
  register_rest_route( 'wp/v2', '/fournisseur', array(
    'methods' => 'POST',
    'callback' => 'post_all',
  ) );
} );

// alert fonction 
function capitaine_assets() {
 wp_enqueue_script( 'capitaine', plugin_dir_url( __FILE__ )  . '/assets/scripts.js', array( 'jquery' ), '1.0', true );
 wp_enqueue_script( 'dd', "https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js", array( 'jquery' ), '1.0', true );
 wp_localize_script( 'capitaine', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action( 'wp_enqueue_scripts', 'capitaine_assets' );

// alert connexion fournisseur
add_action( 'wp_ajax_load_comments', 'capitaine_load_comments' );
add_action( 'wp_ajax_nopriv_load_comments', 'capitaine_load_comments' );

function capitaine_load_comments() {
    
$login = $_POST['login'];
$password = $_POST['pass'];

$vqr= array(
    'pass' =>  $password,
    'login' =>  $login,
  );

  $wp_hasher = new PasswordHash(8,true);


  $user= get_user_by('login', $login);

  if($wp_hasher->CheckPassword($password,$user->user_pass)){

    ob_start();
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    echo json_encode(array('code1'=>200,'message'=>'success', 'role'=>$user->roles));
 
} else {


echo json_encode(array('code1'=>404,'message'=>'login ou password incorrect'));

}
    wp_die();

}  
// alert inscription personne phyique

add_action( 'wp_ajax_insert_fourn', 'capitaine_insert_fourn' );
add_action( 'wp_ajax_nopriv_insert_fourn', 'capitaine_insert_fourn' );

function capitaine_insert_fourn() {
    global $wpdb;
    $nom = $_POST['nom'];
    $code = $_POST['code'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $tel = $_POST['tel'];
$vqr= array(
    'nom' =>  $nom,
    'prenom' =>  $prenom,
    'cin' =>  $cin,
    'code' =>  $code,
    'password' =>  $hash,
    'login' =>  $login,
    'email' =>  $email,
    'tel' =>  $tel,
  );

if(isset ($_POST['nom'] , $_POST['code'], $_POST['prenom'], $_POST['cin'], $_POST['email'], $_POST['tel'])){
 $user = get_user_by('login', $login);
 $user_m = get_user_by('email', $email);

 $conn = oci_connect('c##hamza','123','localhost/orcl');
    $requete1="select nom,code,prenom,cin,email,tel from FOURNISSEUR where code ='$code'";
    $stmt = oci_parse($conn, $requete1);
     oci_execute($stmt);
     oci_fetch_all($stmt,$extract);
if(in_array($nom,$extract['NOM']) and in_array($code,$extract['CODE']) and in_array($prenom,$extract['PRENOM']) and 
   in_array($cin,$extract['CIN']) and  in_array($email,$extract['EMAIL']) and  in_array($tel,$extract['TEL'])
    && !$user_m &&  !$user){ 
     echo json_encode(array('code1'=>200 ,'message'=>'s le compte est créé et activé')); 
     // $wpdb->insert('fournisseur', array('nom' => $nom, 'code' => $code, 'login' => $login, 'password' => $hash)); 
       $userdata = array(
        'user_login' => $login,
        'first_name' => $prenom,
        'last_name' => $nom,
        'user_pass' => $password,
        'user_email' =>  $email,
        'role' => 'fournisseur' 
        );

$user_id = wp_insert_user( $userdata ) ;

}
else {
echo json_encode(array('code1'=>404 ,'message'=>'informations saisies ne correspondent pas aux informations saisies sur le système de gestion, veuillez contacter la SNTL'));
}}
    wp_die();
}

// alert inscription personne morale

add_action( 'wp_ajax_insert_morale', 'capitaine_insert_morale' );
add_action( 'wp_ajax_nopriv_insert_morale', 'capitaine_insert_morale' );

function capitaine_insert_morale() {
    global $wpdb;
    $raison = $_POST['raison'];
    $code1 = $_POST['code1'];
    $login1 = $_POST['login1'];
    $password = $_POST['password'];
    $registre = $_POST['registre'];
    $tel1 = $_POST['tel1'];
$vqr= array(
    'raison' =>  $raison,
    'tel1' =>  $tel1,
    'code1' =>  $code1,
    'password' =>  $password,
    'login1' =>  $login1,
    'registre' =>  $registre,
  );

if(isset ($_POST['raison'] , $_POST['code1'], $_POST['registre'], $_POST['tel1'])){

  $user= get_user_by('login', $login1);


 $conn = oci_connect('c##hamza','123','localhost/orcl');
    $requete1="select raison,code,registre,tel from MORALE where code ='$code1'";
    $stmt = oci_parse($conn, $requete1);
     oci_execute($stmt);
     oci_fetch_all($stmt,$extract) ;
if(in_array($raison,$extract['RAISON']) and in_array($registre,$extract['REGISTRE']) and in_array($code1,$extract['CODE'])  
    and in_array($tel1,$extract['TEL']) &&  !$user){
    
     echo json_encode(array('code1'=>200 ,'message'=>'le compte est créé et activé')); 
       $userdata = array(
        'user_login' => $login1,
        'first_name' => $raison,
        'user_pass' => $password,
        'role' => 'fournisseur' 
        );

$user_id = wp_insert_user( $userdata ) ;

}
else {
echo json_encode(array('code1'=>404 ,'message'=>'informations saisies ne correspondent pas aux informations saisies sur le système de gestion, veuillez contacter la SNTL'));
}}
    wp_die();
}


// alert inscription client

add_action( 'wp_ajax_insert_client', 'capitaine_insert_client' );
add_action( 'wp_ajax_nopriv_insert_client', 'capitaine_insert_client' );

function capitaine_insert_client() {
    global $wpdb;
    $rs = $_POST['rs'];
    $nom2 = $_POST['nom2'];
    $prenom2 = $_POST['prenom2'];
    $code2 = $_POST['code2'];
    $login2 = $_POST['login2'];
    $password = $_POST['password'];
    $email2 = $_POST['email2'];
    $tel2 = $_POST['tel2'];


$vqr= array(
    'rs' =>  $rs,
    'tel2' =>  $tel2,
    'code2' =>  $code2,
    'password' =>  $password,
    'login2' =>  $login2,
    'email2' =>  $email2,
    'nom2' =>  $nom2,
    'prenom2' =>  $prenom2,
  );


if(isset ($_POST['rs'] , $_POST['code2'], $_POST['email2'], $_POST['tel2'], $_POST['nom2'], $_POST['prenom2'])){

  $user= get_user_by('login', $login2);
  $user_m = get_user_by('email', $email);

 $conn = oci_connect('c##hamza','123','localhost/orcl');
    $requete1="select nom,prenom,raison,code,email,tel from CLIENT where code ='$code2'";
    $stmt = oci_parse($conn, $requete1);
     oci_execute($stmt);
     oci_fetch_all($stmt,$extract) ;
if(in_array($rs,$extract['RAISON']) and in_array($email2,$extract['EMAIL']) and in_array($code2,$extract['CODE'])  
    and in_array($tel2,$extract['TEL']) and in_array($nom2,$extract['NOM']) and in_array($prenom2,$extract['PRENOM']) && !$user_m &&  !$user){
    
     echo json_encode(array('code1'=>200 ,'message'=>'le compte est créé et activé')); 
       $userdata = array(
        'user_login' => $login2,
        'first_name' => $prenom2,
        'last_name' => $nom2,
        'user_pass' => $password,
        'user_email' =>  $email2,
        'role' => 'client' 
        );

$user_id = wp_insert_user( $userdata ) ;

}
else {
echo json_encode(array('code1'=>404 ,'message'=>'informations saisies ne correspondent pas aux informations saisies sur le système de gestion, veuillez contacter la SNTL'));
}}
    wp_die();
}




// check if user is loged in before accessing to info page
function checklogin($wpcon){
    ob_start();
    session_start();
   // var_dump($_SESSION['login']); die();
   
    if(!isset($_SESSION['login'])){
            header('location: wordpress/connexion'); 
    }

}


?>