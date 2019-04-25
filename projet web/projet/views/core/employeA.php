<?PHP
include "../config.php";
class EmployeA1 {
function afficherEmployeA ($employe){
		echo "id: ".$employe->getid()."<br>";
		echo "date: ".$employe->getdate()()."<br>";
		echo "heure: ".$employe->getheure()."<br>";
		echo "lieu: ".$employe->getlieu()."<br>";
		echo "sujet: ".$employe->getsujet()."<br>";
	}
	function calculerSalaire($employe){
		echo $employe->getNbHeures() * $employe->getTarifHoraire();
	}
	function ajouterEmployeA($employe){
		$sql="insert into event (id,date,heure,lieu,sujet) values (:id,:date,:heure,:lieu,:sujet)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$employe->getid();
        $date=$employe->getdate();
        $heure=$employe->getheure();
        $lieu=$employe->getlieu();
        $sujet=$employe->getsujet();
		$req->bindValue(':id',$id);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
		$req->bindValue(':lieu',$lieu);
		$req->bindValue(':sujet',$sujet);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherEmployesA(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From event";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEmployeA($id){
		$sql="DELETE FROM event where id= :id";
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
	function modifierEmployeA($employe,$id){
		$sql="UPDATE event SET id=:id,date=:date,heure=:heure,lieu=:lieu,sujet=:sujet WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$employe->getid();
        $date=$employe->getdate();
        $heure=$employe->getheure();
        $lieu=$employe->getlieu();
        $sujet=$employe->getsujet();
		$datas = array( ':id'=>$id, ':date'=>$date,':heure'=>$heure,':lieu'=>$lieu,':sujet'=>$sujet);
		$req->bindValue(':id',$id);
		$req->bindValue(':date',$date);
		$req->bindValue(':heure',$heure);
		$req->bindValue(':lieu',$lieu);
		$req->bindValue(':sujet',$sujet);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererEmployeA($id){
		$sql="SELECT * from event where id=$id";
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
		$sql="SELECT * from event where tarifHoraire=$tarif";
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