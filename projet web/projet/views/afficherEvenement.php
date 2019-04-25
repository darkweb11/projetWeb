<?PHP
include "../core/evenementC.php";
$event1C=new EventC();
$listeEvenement=$event1C->afficherEvenement();

//var_dump($listeEvenement->fetchAll());
?>
<table border="1">
<tr>
<td>id</td>
<td>date</td>
<td>heure</td>
<td>lieu</td>
<td>sujet</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeEvenement as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><?PHP echo $row['heure']; ?></td>
	<td><?PHP echo $row['lieu']; ?></td>
	<td><?PHP echo $row['sujet']; ?></td>
	<td><form method="POST" action="supprimerEvenement.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierEvenement.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


