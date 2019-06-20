<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script >
		$(document).ready(function() {

			alert("fetching");

			$.get("https://joshtalks.com/joshkosh/api/get_states.php", 
				function(data, status){
					alert("Data: " + data + "\nStatus: " + status);
				}
			);	

		});

	</script>
</head>
<button>Tap me</button>
</body>
</html>