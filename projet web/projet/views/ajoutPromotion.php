<?PHP
include "../entities/promotion.php";
include "../core/promotionC.php";

if (isset($_POST['id']) and isset($_POST['Produit']) and isset($_POST['PrixInit']) and isset($_POST['PrixFin'])and isset($_POST['Date'])){
$promo1=new promo($_POST['id'],$_POST['Produit'],$_POST['PrixInit'],$_POST['PrixFin'],$_POST['Date']);
//Partie2
/*
var_dump($promo1);
}
*/
//Partie3
$promo1C=new PromoC();
$promo1C->ajouterPromotion($promo1);
header('Location: blog.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>