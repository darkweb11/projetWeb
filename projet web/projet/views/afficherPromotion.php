<?PHP
include "../core/promotionC.php";
$promo1C=new promoC();
$listePromotion=$promo1C->afficherPromotion();

//var_dump($listePromotion->fetchAll());
?>

<table border="1">
<tr>
<td>id</td>
<td>Produit</td>
<td>PrixInit</td>
<td>PrixFin</td>
<td>Date</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listePromotion as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['Produit']; ?></td>
	<td><?PHP echo $row['PrixInit']; ?></td>
	<td><?PHP echo $row['PrixFin']; ?></td>
	<td><?PHP echo $row['Date']; ?></td>
	<td><form method="POST" action="supprimerPromotion.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierPromotion.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


