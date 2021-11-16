<?php
 class Database_oracle{
	// connexion à la base Oracle et création de l'objet
 private $hote = '127.0.0.1';
 private $port = '1521'; // port par défaut
 private $service = 'orcl';
 private $utilisateur = 'c##hamza';
 private $motdepasse = '123';
 private $conn;



public function connect() {
	$this->conn = null;
try
{

	//$this->conn = new PDO('oci:dbname=orcl', $this->utilisateur, $this->motdepasse);
	$this->conn = oci_connect('c##hamza','123','localhost/orcl');
	//$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $erreur)
{
	echo $erreur->getMessage();
}
return $this->conn;
}
}