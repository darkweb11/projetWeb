<?PHP
include "../core/evenementC.php";
$eventC=new EventC();
if (isset($_POST["id"])){
	$eventC->supprimerEvenement($_POST["id"]);
	header('Location: afficherEvenement.php');
}

?>