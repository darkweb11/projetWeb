<?PHP
include "../test/vol.php";
include "../test/volC.php";

if (isset($_POST['Ref']) and isset($_POST['Destination']) and isset($_POST['Date']) and isset($_POST['HDepart']) and isset($_POST['HArrivee'])){

$vol1=new Vol($_POST['Ref'],"hhh",$_POST['Destination'],$_POST['Date'],$_POST['HDepart'],$_POST['HArrivee']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3

$vol1C=new VolC();
$vol1C->ajouterVol($vol1);
header('Location: afficherVol.php');

}else{
	echo "vérifier les champs";
}
//*/

?>
