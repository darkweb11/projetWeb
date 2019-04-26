<?php
include "../test/config.php";

class VolC {
function afficherVol($vol){
		echo "Ref: ".$vol->getRef()."<br>";
		echo "CompagnieAerienne: ".$vol->getCompagnieAerienne()."<br>";
		echo "Destination: ".$vol->getDestination()."<br>";
		echo "Date: ".$vol->getDate()."<br>";
    	echo "HDepart: ".$vol->getHDepart()."<br>";
      	echo "HArrivee: ".$vol->getHArrivee()."<br>";

	}

	function ajouterVol($vol){
		$sql="insert into vol (Ref,Destination,Date,HDepart,HArrivee) values (:Ref,:Destination,:Date,:HDepart,:HArrivee)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $Ref=$vol->getRef();
      //  $CompagnieAerienne=$vol->getCompagnieAerienne();
        $Destination=$vol->getDestination();
        $Date=$vol->getDate();
        $HDepart=$vol->getHDepart();
        $HArrivee=$vol->getHArrivee();

	  $req->bindValue(':Ref',$Ref);
	//	$req->bindValue(':CompagnieAerienne',$CompagnieAerienne);
		$req->bindValue(':Destination',$Destination);
		$req->bindValue(':Date',$Date);
  	$req->bindValue(':HDepart',$HDepart);
  	$req->bindValue(':HArrivee',$HArrivee);


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function affichervols(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From vol WHERE CompagnieAerienne='compagnie_1'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function modifierVol($vol,$Ref){
		$sql="UPDATE vol set Ref=:Ref,CompagnieAerienne=:CompagnieAerienne,Destination=:Destination,Date=:Date,
    HDepart=:HDepart,HArrivee=:HArrivee WHERE Ref=:Ref";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $Ref=$vol->getRef();
            $CompagnieAerienne=$vol->getCompagnieAerienne();
            $Destination=$vol->getDestination();
            $Date=$vol->getDate();
            $HDepart=$vol->getHDepart();
            $HArrivee=$vol->getHArrivee();


		$datas = array(':Ref'=>$Ref,':CompagnieAerienne'=>$CompagnieAerienne,':Destination'=>$Destination,':Date'=>$Date,':HDepart'=>$HDepart,
  ':HArrivee'=>$HArrivee);

    $req->bindValue(':Ref',$Ref);
  		$req->bindValue(':CompagnieAerienne',$CompagnieAerienne);
  		$req->bindValue(':Destination',$Destination);
  		$req->bindValue(':Date',$Date);
    	$req->bindValue(':HDepart',$HDepart);
    	$req->bindValue(':HArrivee',$HArrivee);

			$req->bindValue(':Ref',$Ref);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}
	function recupererVol($Ref){
		$sql="SELECT * from vol where Ref=$Ref";
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
