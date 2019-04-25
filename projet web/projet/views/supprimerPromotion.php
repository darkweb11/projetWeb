<?PHP
include "../core/promotionC.php";
$promoC=new PromoC();
if (isset($_POST["id"])){
	$promoC->supprimerPromotion($_POST["id"]);
	header('Location: afficherPromotion.php');
}

?>