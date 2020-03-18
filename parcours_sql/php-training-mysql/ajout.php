<?php

include 'connexion.php';

$donnees = [
        'name' => ucfirst($_POST['name']),
        'difficulty' => ucfirst($_POST['difficulty']), 
        'distance' => $_POST['distance'], 
        'duration' => $_POST['duration'],
        'height_difference' => $_POST['height_difference'],
        'id' => 0,];

$sql = $bdd->prepare
("INSERT INTO hiking VALUES (:id, :name, :difficulty, :distance, :duration, :height_difference)");

$sql->execute($donnees);

session_start();
$_SESSION['success']=1;

header('location:create.php');

?>
