<?php

$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =127.0.0.1)(PORT = 1521))
(CONNECT_DATA =
(SERVER = DEDICATED)
(SERVICE_NAME = orcl)
(INSTANCE_NAME = orcl)))";

$conn = oci_connect('c##hamza','123',$dbstr);
/*if($conn)
{
  Echo "connection succeeded" ;
 }else{
  Echo "connection failed" ;
}
$stmt = oci_parse($conn, "select * from fournisseur");
oci_execute($stmt);
$nrows = oci_fetch_all($stmt, $results);
if ($nrows > 0) {
echo "<table border=\"1\">\n";
echo "<tr>\n";
foreach ($results as $key => $val) {
echo "<th>$key</th>\n";
}
echo "</tr>\n";
for ($i = 0; $i < $nrows; $i++) {
echo "<tr>\n";
foreach ($results as $data) {
echo "<td>$data[$i]</td>\n";
}
echo "</tr>\n";
}
echo "</table>\n";
} else {
echo "No data found<br />\n";
}
oci_free_statement($stmt);
oci_close($conn);
