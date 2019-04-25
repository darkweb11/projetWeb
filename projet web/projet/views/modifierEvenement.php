<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/evenement.php";
include "../core/evenementC.php";
if (isset($_GET['id'])){
	$eventC=new EventC();
    $result=$eventC->recupererEvenement($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$date=$row['date'];
		$heure=$row['heure'];
		$lieu=$row['lieu'];
		$sujet=$row['sujet'];
?>
<form method="POST">
<table>
<caption>Modifier Evenement</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Date</td>
<td><input type="text" name="date" value="<?PHP echo $date ?>"></td>
</tr>
<tr>
<td>Heure</td>
<td><input type="text" name="heure" value="<?PHP echo $heure ?>"></td>
</tr>
<tr>
<td>Lieu</td>
<td><input type="text" name="lieu" value="<?PHP echo $lieu ?>"></td>
</tr>
<tr>
<td>Sujet</td>
<td><input type="text" name="sujet" value="<?PHP echo $sujet ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$event=new event($_POST['id'],$_POST['date'],$_POST['heure'],$_POST['lieu'],$_POST['sujet']);
	$eventC->modifierEvenement($event,$_POST['id']);
	echo $_POST['id'];
	header('Location: afficherEvenement.php');
}
?>
</body>
</HTMl>