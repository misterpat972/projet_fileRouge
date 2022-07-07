<?php 
// ma connexion a la base de données
$bdd = new PDO('mysql:host=localhost;dbname=file_rouge_v2', 'root','', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>