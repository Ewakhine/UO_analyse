<?php
try {
$bdd = new PDO('mysql:host=localhost;dbname=uoanalyse', 'root', '');
$bdd->exec("SET CHARACTER SET utf8"); }
catch (Exception $e) { die('Erreur : '.$e->getMessage()); }
?>