<?php 

class Fournisseur {
    // DB stuff
    public $conn;
   

    // Post Properties
    public $id;
    public $code;
    public $nom;
   
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
    // Get 
    public function read() {
    
      $query = 'SELECT  * FROM fournisseur' ;
     // $stmt = $this->conn->prepare($query);
     // $stmt->execute();
      $stmt = oci_parse($this->conn , $query);
      oci_execute($stmt);
      return $stmt;
    }

    }