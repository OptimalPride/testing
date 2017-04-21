<?php 
header("Access-Control-Allow-Origin : *"); //les requetes http de type crosssite sont des requetes pour des ressources localisees sur un domaine different de celui a l'origine de la requete 

$retour = array("erreur" => true);

if (isset($_POST["marque"]) && isset($_POST["modele"]) && isset($_POST["annee"]) && isset($_POST["couleur"]) && isset($_POST["date_create"]) ) {

	$pdo = new PDO("mysql:host=localhost;dbname=Mike", "root", "");

	$retour["post"] = $_POST;

	$marque = $_POST["marque"]; 
	$modele = $_POST["modele"];
	$annee = $_POST["annee"];
	$couleur = $_POST["couleur"];
	$date_create = $_POST["date_create"];

	$resultat = $pdo -> prepare("INSERT INTO car (marque, modele, annee, couleur, date_create) VALUES ('$marque', '$modele', '$annee', '$couleur', '$date_create')");

	$retour["resultat"] = $resultat;
	if($resultat -> execute()){

		$retour["erreur"] = false;
		$retour["message"] = "ça marche";

	}
	else{
		$erreur = $resultat -> errorInfo();
		$retour["message"] = $erreur[2];
	}

}

else {
	$retour["message"] = "requete non valide";
}
echo json_encode($retour);

?>