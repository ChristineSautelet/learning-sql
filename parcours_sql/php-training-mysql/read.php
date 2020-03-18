<?php
include 'connexion.php';
$resultat = $bdd->query('SELECT * FROM hiking');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics2.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
      <tr>

							<th>Name</th>
							<th>Difficulty</th>
							<th>Distance (km)</th>
              <th>Duration</th>
              <th>Height difference</th>
              <th></th>

						<?php
						while ($donnees = $resultat->fetch()){
              echo '<tr>';
              echo '<td><a href="update.php?lid='.$donnees['id'].'">'.$donnees['name'].'</a></td>';
							echo '<td align=center>',$donnees['difficulty'],'</td>';
              echo '<td align=center>',$donnees['distance'],'</td>';
              echo '<td align=center>',$donnees['duration'],'</td>';
              echo '<td align=center>',$donnees['height_difference'],'</td>';
              echo '<td><button type="submit" name="button.'.$donnees['id'].'"><a href="delete.php?lid='.$donnees['id'].'">Supprimer</a></button></td>';
							echo '</tr>';
						}
						$resultat->closeCursor();					
						?>
    </table>
  </body>
</html>
