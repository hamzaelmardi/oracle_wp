<?php
/*
Plugin Name: Plugin test_oracle
Description: test test
*/
/**
 *  
 */

add_action( 'wp_enqueue_scripts', 'my_custom_enqueue_scripts');
    function my_custom_enqueue_scripts() {
        wp_enqueue_style('jquery-datatables-css','//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css');
        wp_enqueue_script('jquery-datatables-js','//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',array('jquery'));
    }
 
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
   /* $query = "INSERT into fournisseur($fields) values($values)";
    $list = $wpdb->get_results($query);
    return $list;*/
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
 $db = new PDO('mysql:dbname=wordpress;host=127.0.0.1', 'root', '');
$sql= "SELECT * FROM fournisseur WHERE login = '$login' ";
  $result = $db->prepare($sql);
  $result->execute();
  if( $result->rowcount() > 0){
    $user= $result->fetch();
  if(password_verify($password, $user['password'])){
    ob_start();
    session_start();
$_SESSION['login'] = $login;
$_SESSION['password'] = $password;
    echo json_encode(array('code1'=>200,'message'=>'success'));
 
}else {
echo json_encode(array('code1'=>404,'message'=>'error'));
}}
    wp_die();

}
// alert inscription fournniseur

add_action( 'wp_ajax_insert_fourn', 'capitaine_insert_fourn' );
add_action( 'wp_ajax_nopriv_insert_fourn', 'capitaine_insert_fourn' );

function capitaine_insert_fourn() {
    global $wpdb;
    $nom = $_POST['nom'];
    $code = $_POST['code'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
$vqr= array(
    'nom' =>  $nom,
    'code' =>  $code,
    'password' =>  $hash,
    'login' =>  $login,
  );
if(isset ($_POST['nom'] , $_POST['code'])){
$db = new PDO('mysql:dbname=wordpress;host=127.0.0.1', 'root', '');
$req= "SELECT * FROM fournisseur WHERE login = '$login'";
$result = $db->prepare($req);
$result->execute();
if($result->rowcount() > 0){
    $exists=true;
}else{
    $exists=false;
}
 $conn = oci_connect('c##hamza','123','localhost/orcl');
    $requete1="select nom,code from FOURNISSEUR";
    $stmt = oci_parse($conn, $requete1);
     oci_execute($stmt);
     oci_fetch_all($stmt,$extract) ;
if(in_array($nom,$extract['NOM']) and in_array($code,$extract['CODE']) &&  $exists==false){
    
     echo json_encode(array('code1'=>200 ,'message'=>'inscription valide'));   
       $wpdb->insert('fournisseur', array('nom' => $nom, 'code' => $code, 'login' => $login, 'password' => $hash)); 

}
else {
echo json_encode(array('code1'=>404 ,'message'=>'inscription non valide'));
}}
    wp_die();
}

// check if user is loged in before accessing to info page
function checklogin($wpcon){
    ob_start();
    session_start();
   // var_dump($_SESSION['login']); die();
   
    if(isset($_SESSION['login'])){
        $id = $_SESSION['login'];
        $query = "select * from fournisseur where id ='$id' limit 1";
        $result = mysqli_query($wpcon,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }else{
        
        header('location: wordpress/connexion'); 
    }

}

?>
