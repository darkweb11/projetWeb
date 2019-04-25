<?PHP
include "../entities/promotion.php";
include "../core/promotionC.php";
$promo=new Promo(0123,'BEN Ahmed',100,50,10/10/2019);
$promoC=new PromoC();
$promoC->afficherPromotion($promo);
echo "****************";
echo "<br>";
echo "id:".$promo->getid();
echo "<br>";
echo "Produit:".$promo->getProduit();
echo "<br>";
echo "PrixInit:".$promo->getPrixInit();
echo "<br>";
echo "PrixFin:".$promo->getPrixFin();
echo "<br>";
echo "Date:".$promo->getDate();
echo "<br>";


?>