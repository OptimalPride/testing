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
<div>
	<p id="message"></p>
</div>
<div id="mike"></div>

<script>
	
$(function(){ //document ready en jquery -> s'execute quand doc est fini
	$("input").click(function(e){ // le e stock l'évenement

		e.preventDefault(); //Annulation de l'actualiation de la page

		console.log("Mike"); // Console prenom Mike

		var myRequest = $("#sql").val(); //recuperation valeur textarea
		var myDatabase = $("#database").val();

		var request = $.ajax({ 	// Requete Ajax - envoi des informations du form vers autre page de traitement, prend du json -> {json}
		  url: "traitement_ajax.php", // cible page requete
		  method: "POST", // methode de requete
		  data : {requet : myRequest, datab : myDatabase} // data envoyé a la page
		});
		 
		request.done(function( msg ) { 
			msg = JSON.parse(msg); // conversion Json en object js

			if(msg.erreur == false) {
				$( "#mike" ).html( msg.message );
				$( "#requet" ).html( myRequest );
				$( "#message" ).text("Voici les résultats de votre requete");
				$( "#message" ).css({"background-color":"green"});					
			}
			else {
				$( "#message" ).text(msg.message);
				$( "#message" ).css({"background-color":"red"});
			}


		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});

</script>

</body>

</html>