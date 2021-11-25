<?php
ob_start();
session_start();
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

//echo "welcome  " ."<b>".$_SESSION["login"]."</b>";
 $table1= '<html>
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
</style>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
<script>
$(document).ready(function() {
    $("#example thead tr").clone(true).appendTo( "#example thead" );
    $("#example thead tr:eq(1) th").each( function (i) {
        var title = $(this).text();
         $(this).html( \'<input type="text" placeholder="Search \'+title+\'" style="width: 100%; "/>\' );
 
        $( "input", this ).on( "keyup change", function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $("#example").DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>

<body>
<div class="row justify-content-start">
<div class="col-10">
<table id="example" class="display">
    <thead>
        <tr>
            <th>Info</th>
            <th>Numero</th>
            <th>Status</th>
            <th>Date</th>
            <th>Ficher</th>
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
</div>
</div>


<b> <center> Click here to<a href = "/wordpress/wp-content/plugins/test/logout" class="button"> logout.<a></center> </b>
</body>
'; 

}
return $table1;
}

add_shortcode('infoshortcode','info_shortcode');