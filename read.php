<?php 
header("Access-Control-Allow-Origin : *");
$pdo = new PDO("mysql:host=localhost;dbname=Mike", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$resultat = $pdo -> prepare("SELECT * FROM utilisateurs");

$resultat -> execute();
//$utilisateurs = $resultat -> fetchAll();


/*
//sleep(20);
echo "<pre>";
var_dump($utilisateurs);
echo "</pre>";
*/

$utilisateurs = $resultat -> fetchAll(PDO::FETCH_ASSOC);
 
$tableau = "<table border='1'><tr>";

foreach ($utilisateurs[0] as $key => $value) {
	$tableau .= "<th>" . $key ."</th>";
}

$tableau .= "</tr>";

for ($i=0; $i < count($utilisateurs); $i++) {
	$tableau .= "<tr>";
	foreach ($utilisateurs[$i] as $key => $value) {
		$tableau .= "<td>" . $value . "</td>";
	}
	$tableau .= "</tr>";
}

$tableau .= "</table><br>";

echo $tableau;

echo json_encode($utilisateurs);

?>
