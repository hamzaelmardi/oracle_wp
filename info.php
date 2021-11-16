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
 $table1= '<html>
  <head>
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
    
    
    
<script>
$(document).ready(function() {
    $("#example").DataTable();
});
</script>
<body>
<table id="example" class="display">
    <thead>

  
        <tr>
            <th>Column 1</th>
            <th>Column 1</th>
            <th>Column 1</th>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>';
        for ($i = 0; $i < $nrows; $i++) { 
$table1 .= '<tr>';
 foreach ($results as $data) { 
$table1 .= "<td >  $data[$i] </td>";
 } 
 $table1 .= '</tr>';
}

$table1 .= '</tbody>
</table>
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript">$(document).ready( function () {
    $("#table_id").DataTable();
} );</script>
</html>'; 

}
return $table1;
}

 
add_shortcode('infoshortcode','info_shortcode');