<?PHP
include "../config.php";
class PromoC {
function afficherPromotion ($promo){
		echo "id: ".$promo->getid()."<br>";
		echo "Produit: ".$promo->getProduit()."<br>";
		echo "PrixInit: ".$promo->getPrixInit()."<br>";
		echo "PrixFin: ".$promo->getPrixFin()."<br>";
		echo "Date: ".$promo->getDate()."<br>";
	}
	
	function ajouterPromotion($promo){
		$sql="insert into promo (id,Produit,PrixInit,PrixFin,Date) values (:id,:Produit,:PrixInit,:PrixFin,:Date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$promo->getid();
        $Produit=$promo->getProduit();
        $PrixInit=$promo->getPrixInit();
        $PrixFin=$promo->getPrixFin();
        $Date=$promo->getDate();
		$req->bindValue(':id',$id);
		$req->bindValue(':Produit',$Produit);
		$req->bindValue(':PrixInit',$PrixInit);
		$req->bindValue(':PrixFin',$PrixFin);
		$req->bindValue(':Date',$Date);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherPromotions(){
		//$sql="SElECT * From promo e inner join formationphp.promo a on e.cin= a.cin";
		$sql="SElECT * From promo ORDER BY id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerPromotion($id){
		$sql="DELETE FROM promo where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierPromotion($promo,$id){
		$sql="UPDATE promo SET id=:id, Produit=:Produit,PrixInit=:PrixInit,PrixFin=:PrixFin,Date=:Date WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$promo->getid();
        $Produit=$promo->getProduit();
        $PrixInit=$promo->getPrixInit();
        $PrixFin=$promo->getPrixFin();
        $Date=$promo->getDate();
		$datas = array( ':id'=>$id, ':Produit'=>$Produit,':PrixInit'=>$PrixInit,':PrixFin'=>$PrixFin,':Date'=>$Date);
		$req->bindValue(':id',$id);
		$req->bindValue(':Produit',$Produit);
		$req->bindValue(':PrixInit',$PrixInit);
		$req->bindValue(':PrixFin',$PrixFin);
		$req->bindValue(':Date',$Date);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererPromotion($id){
		$sql="SELECT * from promo where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListePromotion($tarif){
		$sql="SELECT * from promo where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>