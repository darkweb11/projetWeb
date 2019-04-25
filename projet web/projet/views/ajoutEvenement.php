<?PHP
include "../entities/evenement.php";
include "../core/evenementC.php";

if (isset($_POST['id']) and isset($_POST['date']) and isset($_POST['heure']) and isset($_POST['lieu'])and isset($_POST['sujet'])){
$event1=new event($_POST['id'],$_POST['date'],$_POST['heure'],$_POST['lieu'],$_POST['sujet']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$event1C=new EventC();
$event1C->ajouterEvenement($event1);
header('Location: product-list.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>