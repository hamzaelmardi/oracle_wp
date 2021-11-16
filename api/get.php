 <?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database_oracle.php';
  include_once '../model/Fournisseur.php';

  // Instantiate DB & connect
  $database = new Database_oracle();
  $db = $database->connect();

  // Instantiate blog post object
  $fournisseur = new Fournisseur($db);

  // fournisseur query
  $result = $fournisseur->read();
  
  // Get row count
  $num = oci_num_rows($result);
var_dump($num);
die();
  // Check if any posts
  if($num > 0) {
    // Post array
    $fournisseur_arr = array();
    

    while($row = oci_fetch_array($result,OCI_ASSOC))  {
      extract($row);

      $fournisseur_item = array(
        'id' => $id,
        'code' => $code,
        'nom' => $nom,
      );
     
      // Push to "data"
      array_push($fournisseur_arr, $fournisseur_item);
    }

    // Turn to JSON & output
    echo  json_encode($fournisseur_arr);

  } else {
    // No fournisseur
    echo json_encode(
      array('message' => 'Nothing Found')
    );
  }
 