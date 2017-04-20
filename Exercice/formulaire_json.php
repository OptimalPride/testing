
<head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></head>

<script>
	
$(function(){ //start document ready en Jquery

		var request = $.ajax({ 	
		  url: "http://jsonplaceholder.typicode.com/users", // cible page requete
		  method: "GET", // methode de requete
		});
		 
		request.done(function( msg ) { 
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
				    if (index == "name") {
				    	table += "<a href='";
				    	table += value;
				    	table += "' name='";
				    	table += i;
				    	table += "'>";
				    	table += value;
				    	table += "</a>";
				    }
			    	else if(index == "address") {
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

			$("a").click(function(e) { // traitement informations individuelle
				e.preventDefault(); 
				var	name = $(this).attr('href');
				var	i = $(this).attr('name');
				var info = name;
				info += " : ";
				info += "<table border='1'>";
				info += "<tr>";
				$.each(msg[i], function(index, value) {
				    if (index == "name") {
				    }
				    else {
	    			info += "<th>";
	    			info += index;
	    			info += "</th>";
	    			}
				});
				info += "</tr>";
			    info += "<tr>";
				$.each(msg[i], function(index, value) {
				    if (index == "name") {
				    }
			    	else if(index == "address") {
			    		info += "<td>";
						info += value.street;
						info += " ";
						info += value.city;
						info += " ";
						info += value.zipcode;
						info += "</td>";
			    	}
			    	else if(index == "company") {
			    		info += "<td>";
						info += value.name;	
						info += "</td>";
			    	}
			    	else {
			    		info += "<td>";
						info += value;	
						info += "</td>";	    		
			    	} 
					}); 
			    info += "</tr>";
	    		info += "</table>";
				$( "#info" ).html( info );
			});
		});

		request.fail(function(XPDDR, data){
			alert("Request fail !")
		})


//testing shit
var test = "abc def";
var result = test.split(' ');
console.log (result);

}); //fin function()
</script>

<table border="1" id="tableau">

</table>

<br><br>
<div id="info"></div>

<div id="test"></div>