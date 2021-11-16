<?php
 class Database {

    // DB Connect
    public function connect() {
      $this->conn = null;
/*$dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST =127.0.0.1)(PORT = 1521))
(CONNECT_DATA =
(SERVER = DEDICATED)
(SERVICE_NAME = orcl)
(INSTANCE_NAME = orcl)))";
$username = 'c##hamza';
     $password = '123';*/
     $conn;
      try{

   // $conn = new PDO('oci:dbname='.$dbstr,$username,$password);
    $conn = new PDO ('oci:dbname=orcl', 'c##hamza', '123');
    
}catch(PDOException $e){
    echo ($e->getMessage());
}

      return $this->conn;
    }


   
  }
