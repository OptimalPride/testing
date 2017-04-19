
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></head>
<script>
	
$(function(){ 

		var request = $.ajax({ 	
		  url: "http://jsonplaceholder.typicode.com/users", // cible page requete
		  method: "GET", // methode de requete
		});
		 
		request.done(function( msg ) { 
			console.log(msg);
			var table = "<tr>";
			$.each(msg[0], function(index, value) {
    			table += "<th>";
    			table += index;
    			table += "</th>";
			}); 
			table += "</tr>";
			for (var i = 0; i < msg.length; i++) {
			    table += "<tr>";

			    	$.each(msg[i], function(index, value) {
				    	table += "<td>";
			    	if(index == "address") {
						table += value.street;
						table += " ";
						table += value.city;
						table += " ";
						table += value.zipcode;
			    	}
			    	else if(index == "company") {
						table += value.name;	
			    	}
			    	else {
						table += value;		    		
			    	}
			    	table += "</td>"; 

					}); 
			    table += "</tr>";
			}; 
			table += "</tr>";
			$( "#tableau" ).html( table );
			console.log(table);
		});

		request.fail(functi
			on(XPDDR, data){
			alert("Request fail !")
		})
});
</script>

<table border="1" id="tableau">

</table>