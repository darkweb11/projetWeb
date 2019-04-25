<?PHP
include "../config.php";
class EmployeC {
function afficherEmploye ($employe){
		echo "id: ".$employe->getid()."<br>";
		echo "Produit: ".$employe->getProduit()."<br>";
		echo "PrixInit: ".$employe->getPrixInit()."<br>";
		echo "PrixFin: ".$employe->getPrixFin()."<br>";
		echo "Date: ".$employe->getDate()."<br>";
	}
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	function ajouterEmploye($employe){
		$sql="insert into promo (id,Produit,PrixInit,PrixFin,Date) values (:id,:Produit,:PrixInit,:PrixFin,:Date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$employe->getid();
        $Produit=$employe->getProduit();
        $PrixInit=$employe->getPrixInit();
        $PrixFin=$employe->getPrixFin();
        $Date=$employe->getDate();
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
	
	function afficherEmployes(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From promo";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEmploye($id){
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
	function modifierEmploye($employe,$id){
		$sql="UPDATE promo SET id=:id, Produit=:Produit,PrixInit=:PrixInit,PrixFin=:PrixFin,Date=:Date WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$employe->getid();
        $Produit=$employe->getProduit();
        $PrixInit=$employe->getPrixInit();
        $PrixFin=$employe->getPrixFin();
        $Date=$employe->getDate();
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
	function recupererEmploye($id){
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
	
	function rechercherListeEmployes($tarif){
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