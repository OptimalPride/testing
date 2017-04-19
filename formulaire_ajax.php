<?php 


$pdo = new PDO("mysql:host=localhost", "root", "");
$databases = $pdo -> query("SHOW DATABASES");
$dataBase = $databases -> fetchAll(PDO::FETCH_ASSOC);


?>



<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<h1>Formulaire avec ajax</h1>

<!-- Données -->

<form action="" method="post">

	<label>Bdd :</label>
	<select name="database" id="database">
		<?php for ($i=0; $i < count($dataBase);  $i++) : $database = $dataBase[$i]['Database']; ?>
			<option value="<?= $database ?>"><?= $database ?></option>
		<?php endfor;  ?>
	</select><br><br>
	
	<fieldset>
	<legend>Requete :</legend><br>
	<textarea name="sql" id="sql" rows="10" cols="60" style="padding: 5px;"></textarea><br>

	<input type="submit" value="OK">
	</fieldset>
</form>
<div id="mike"></div>
<script>
	
$(function(){
	$("input").click(function(e){

		//Annulation de l'actualiation de la page
		e.preventDefault();

		// Console prenom Mike
		console.log("Mike");

		//recuperation valeur textarea
		var myRequest = $("#sql").val();
		var myDatabase = $("#database").val();
		// Requete Ajax - envoi des informations du form vers autre page de traitement
		var request = $.ajax({
		  url: "traitement_ajax.php", // cible page requete
		  method: "POST", // methode de requete
		  data : {requet : myRequest, datab : myDatabase} // data envoyé a la page
		});
		 
		request.done(function( msg ) { 
		  $( "#mike" ).html( msg );
		  $( "#requet" ).html( myRequest );
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});

</script>


</body>

</html>