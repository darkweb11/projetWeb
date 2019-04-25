<?PHP
include "../entities/evenement.php";
include "../core/evenementC.php";
$event=new Event(0123,10/10/2019,'100','50','salut');
$eventA=new EventA();
$eventA->afficherEvenement($event);
echo "****************";
echo "<br>";
echo "id:".$event->getid();
echo "<br>";
echo "date:".$event->getdate();
echo "<br>";
echo "heure:".$event->getheure();
echo "<br>";
echo "lieu:".$event->getlieu();
echo "<br>";
echo "sujet:".$event->getsujet();
echo "<br>";


?>