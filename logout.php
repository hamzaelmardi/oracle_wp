<?php
   ob_start();
   session_start();
unset($_SESSION['login']);
unset($_SESSION['password']);
header("location: wordpress/connexion");
   
?>