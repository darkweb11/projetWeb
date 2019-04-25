 <?PHP
class Promo{
	private $id;
	private $Produit;
	private $PrixInit;
	private $PrixFin;
	private $Date;
	function __construct($id,$Produit,$PrixInit,$PrixFin,$Date){
		$this->id=$id;
		$this->Produit=$Produit;
		$this->PrixInit=$PrixInit;
		$this->PrixFin=$PrixFin;
		$this->Date=$Date;
	}
	
	function getid(){
		return $this->id;
	}
	function getProduit(){
		return $this->Produit;
	}
	function getPrixInit(){
		return $this->PrixInit;
	}
	function getPrixFin(){
		return $this->PrixFin;
	}
	function getDate(){
		return $this->Date;
	}
function setid($id){
	$this->id=$id;
}
	function setProduit($Produit){
		$this->Produit=$Produit;
	}
	function setPrixInit($PrixInit){
		$this->PrixInit=$PrixInit;
	}
	function setPrixFin($PrixFin){
		$this->PrixFin=$PrixFin;
	}
	function setDate($Date){
		$this->Date=$Date;
	}
	
}

?>