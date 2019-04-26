<?PHP
class Vol{
	private $Ref;
	private $CompagnieAerienne;
	private $Destination;
	private $Date;
	private $HDepart;
  private $HArrivee;
	function __construct($Ref,$CompagnieAerienne,$Destination,$Date,$HDepart,$HArrivee){
		$this->Ref=$Ref;
		$this->CompagnieAerienne=$CompagnieAerienne;
		$this->Destination=$Destination;
		$this->Date=$Date;
		$this->HDepart=$HDepart;
    $this->HArrivee=$HArrivee;
	}

	function getRef(){
		return $this->Ref;
	}
	function getCompagnieAerienne(){
		return $this->CompagnieAerienne;
	}
	function getDestination(){
		return $this->Destination;
	}
	function getDate(){
		return $this->Date;
	}
	function getHDepart(){
		return $this->HDepart;
	}
  function getHArrivee(){
		return $this->HArrivee;
	}

	function setRef($Ref){
		$this->Ref=$Ref;
	}
	function setCompanieAerienne($CompagnieAerienne){
		$this->CompagnieAerienne=$CompagnieAerienne;
	}
	function setDestination($Destination){
		$this->Destination=$Destination;
	}
	function setDate($Date){
		$this->Date=$Date;
	}
  function setHDepart(){
		return $this->HDepart=$HDepart;
	}
  function setHArrivee(){
		return $this->HArrivee=$HArrivee;
	}

}

?>
