<?php
/**** Supprimer une randonnée ****/

$id=$_GET['lid'];
                
include 'connexion.php';

$sql = "DELETE FROM hiking WHERE id='$id';";
$supp = $bdd->prepare($sql);
$supp->execute();

header('location:read.php');

?>

