<?php
$lesvilles=array_keys($_POST);
if (!empty($lesvilles)){

    foreach ($lesvilles as $ville) {

    $servname = "localhost"; $dbname = "weatherapp"; $user = "christinesautelet"; $pass = "user";

    try{
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname;charset=utf8", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM meteo WHERE ville='$ville'";
        $sth = $dbco->prepare($sql);
        $sth->execute();

    }
        
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
    }
    header('Location: index.php');
}
