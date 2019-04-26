<?PHP
include "../test/volC.php";
$vol1C=new VolC();
$listeVols=$vol1C->afficherVols();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>Ref</td>
<td>CompagnieAerienne</td>
<td>Destination</td>
<td>Date</td>
<td>HDepart</td>
<td>HArrivee</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeVols as $row){
	?>
	<tr>
	<td><?PHP echo $row['Ref']; ?></td>
	<td><?PHP echo $row['CompagnieAerienne']; ?></td>
	<td><?PHP echo $row['Destination']; ?></td>
	<td><?PHP echo $row['Date']; ?></td>
	<td><?PHP echo $row['HDepart']; ?></td>
  <td><?PHP echo $row['HArrivee']; ?></td>

	<td><a href="modifierVol.php?Ref=<?PHP echo $row['Ref']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>
