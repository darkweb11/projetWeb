 <?PHP
class Event{
	
	private $id;
	private $date;
	private $heure;
	private $lieu;
	private $sujet;
	
	
	function __construct($id,$date,$heure,$lieu,$sujet){
		$this->id=$id;
		$this->date=$date;
		$this->heure=$heure;
		$this->lieu=$lieu;
		$this->sujet=$sujet;
	}
	
	function getid(){
		return $this->id;
	}
	function getdate(){
		return $this->date;
	}
	function getheure(){
		return $this->heure;
	}
	function getlieu(){
		return $this->lieu;
	}
	function getsujet(){
		return $this->sujet;
	}
function setid($id){
	$this->id=$id;
}
	function setdate($date){
		$this->date=$date;
	}
	function setheure($heure){
		$this->heure=$heure;
	}
	function setlieu($lieu){
		$this->lieu=$lieu;
	}
	function setsujet($sujet){
		$this->sujet=$sujet;
	}
	
}

?>