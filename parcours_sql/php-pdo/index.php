<?php
include 'connexion.php';
$resultat = $bdd->query('SELECT * FROM meteo ORDER BY ville ASC');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css"> 
	<title>Météo</title>
</head>
<body>
	<div class="container">
		<br/><br/><br/>
		<form action="suppression.php" method="POST">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<table>
						<tr>
							<th>Ville</th>
							<th>Maxima</th>
							<th>Minima</th>

						<?php
						while ($donnees = $resultat->fetch()){
							echo '<tr>';
							echo "<td><input type='checkbox' name='",$donnees['ville'],"'>", $donnees['ville'],'</td>';
							echo '<td align=center>',$donnees['haut'],'</td>';
							echo '<td align=center>',$donnees['bas'],'</td>';
							echo '</tr>';
						}
						$resultat->closeCursor();					
						?>
					</table>
				</div>
			</div>
		<div class="col-md-2">
					<div class="form-group">
					<button type="submit" id="supp" class="btn btn-primary TTdetails mb-5 form-control">Supprimer</button>
					</div>
				</div>
				</div>
		</form>
		<br/><br/><br/>
		<form action="ajout.php" method="POST">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="inputville">Ville</label>
						<input type="text" name="ville" class="form-control input-field" id="inputville" required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="inputhaut">Maxima</label>
						<input type="number" name="haut" class="form-control input-field" id="inputhaut" required>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="inputbas">Minima</label>
						<input type="number" name="bas" class="form-control input-field" id="inputbas" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<button type="submit" id="run" class="btn btn-primary TTdetails mb-5 form-control">Ajouter les données</button>
					</div>
				</div>

			</div>
		</form>
</body>
</html>
