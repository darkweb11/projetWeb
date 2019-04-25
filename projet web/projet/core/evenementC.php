<?PHP
include "../config.php";
class EventC {
function afficherEvenement ($event){
		echo "id: ".$event->getid()."<br>";
		echo "date: ".$event->getdate()()."<br>";
		echo "heure: ".$event->getheure()."<br>";
		echo "lieu: ".$event->getlieu()."<br>";
		echo "sujet: ".$event->getsujet()."<br>";
	}
	function ajouterEvenement($event){
		$sql="insert into event (id,date,heure,lieu,sujet) values (:id,:date,:heure,:lieu,:sujet)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$event->getid();
        $date=$event->getdate();
        $heure=$event->getheure();
        $lieu=$event->getlieu();
        $sujet=$event->getsujet();
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
	
	function afficherEvenements(){
		//$sql="SElECT * From event e inner join formationphp.event a on e.cin= a.cin";
		$sql="SElECT * From event ORDER BY id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerEvenement($id){
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
	function modifierEvenement($event,$id){
		$sql="UPDATE event SET id=:id,date=:date,heure=:heure,lieu=:lieu,sujet=:sujet WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$id=$event->getid();
        $date=$event->getdate();
        $heure=$event->getheure();
        $lieu=$event->getlieu();
        $sujet=$event->getsujet();
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
	function recupererEvenement($id){
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
	
	
		function rechercherEvenement($id)
	{
		$sql = "SELECT * from event where id=$id";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

}

?>