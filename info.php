<?php
ob_start();
session_start();
//include_once('bd_wordpress.php');
include('index.php');

function info_shortcode() {


$wpcon = mysqli_connect("localhost","root","","wordpress");
$user_data = checklogin($wpcon);


 // connection database oracle
$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =127.0.0.1)(PORT = 1521))
(CONNECT_DATA =
(SERVER = DEDICATED)
(SERVICE_NAME = orcl)
(INSTANCE_NAME = orcl)))";
$conn = oci_connect('c##hamza','123',$dbstr);
$stmt = oci_parse($conn, "select info,NUMERO,STATUS,DATE_F,fichier from information");
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $results);
 if ($nrows > 0) { 
/* <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />*/
  $table = '
 
   <table   class="display" style="width:100%" id="tab">
   <thead>
  <tr>
   <th >Information</th>  
    <th >Numero</th>
    <th >Status</th>  
    <th >Date</th>  
    <th >Fichier</th>  
  </tr>
  </thead>'
  ;
$table .= '
<tbody>
<tr>';
 for ($i = 0; $i < $nrows; $i++) { 
$table .= '</tr>';
 foreach ($results as $data) { 
$table .= "<td >  $data[$i] </td>";
 } 
}$table .= '</tr></tbody></table> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
<script>
$(document).ready(function(){
    $("#tab").DataTable();
});
</script>
';

}
return $table;
}

 
add_shortcode('infoshortcode','info_shortcode');