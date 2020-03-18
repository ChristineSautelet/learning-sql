<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=php-training-mysql;charset=utf8', 'christinesautelet', 'user');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$lid=$_GET['lid'];
$resultat = $bdd->query('SELECT * FROM hiking WHERE id ='.$lid.'');
$donnees = $resultat->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics2.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Modifier</h1>
	<form action=" <?php echo "modification.php?lid=".$donnees['id'] ?>" method="post">

		
		<div>
			<label for="name">Name</label>
			<input id="name" type="text" name="name" value="<?= $donnees['name']?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="Très facile" <?= ($donnees['difficulty']=='Très facile')? 'selected':''; ?>>Très facile</option>
				<option value="Facile" <?= ($donnees['difficulty']=='Facile')? 'selected':''; ?>>Facile</option>
				<option value="Moyen"<?= ($donnees['difficulty']=='Moyen')? 'selected':''; ?>>Moyen</option>
				<option value="Difficile"<?= ($donnees['difficulty']=='Difficile')? 'selected':''; ?>>Difficile</option>
				<option value="Très difficile"<?= ($donnees['difficulty']=='Très difficile')? 'selected':''; ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="number" step="any"  name="distance" value="<?= $donnees['distance']?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="<?= $donnees['duration']?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="number" name="height_difference" value="<?= $donnees['height_difference']?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if($_SESSION['reussite']<>0):?>
		<br><br>
		<span class="confirm">
		La randonnée a été MODIFIEE avec succès
	</span>
	<?php endif;
	$_SESSION['reussite']=0;
	?>

</body>
</html>
