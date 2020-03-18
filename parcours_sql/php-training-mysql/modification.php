<?php

session_start();

$lename=$_POST['name'];
$name = str_replace("'", "\'", $lename);
$difficulty=$_POST['difficulty'];
$distance=$_POST['distance'];
$duration=$_POST['duration'];
$height_difference=$_POST['height_difference'];
$id=$_GET['lid'];

include 'connexion.php';

$sql = "UPDATE hiking SET name='$name', difficulty='$difficulty', distance='$distance', duration='$duration', 
height_difference='$height_difference' WHERE id='$id';";
$stmt = $bdd->prepare($sql);
$stmt->execute();

session_start();
$_SESSION['reussite']=1;
header('location:update.php?lid='.$id);

?>
