<?php
if (isset($_GET['console']))
{
    $bdd = new PDO('mysql:host=localhost;dbname=test','christinesautelet','user', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $requete = $bdd->prepare('INSERT INTO jeux_video(nom,possesseur) VALUES(?,?)');
    $requete->execute(array($_GET['nom'], $_GET['possesseur']));
}
?>