<!DOCTYPE html>
<html lang="en">
	<title>Featured</title>
	<meta charset="utf-8">
	<meta name="author" content="Francois Viviers">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<?php
	include 'php/header.php'
?>
	<div id="loading">
		<img src="pictures/spinner.gif"></img>
	</div>
	<div id="footer">
		<p>Francois Viviers</p>
	</div>
	<div id="footer"><button id="togglebtn">Light/Dark</button></div>
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	//I made use of synchronous calls because when using RAWG you need to use the id of individual games to get access to a lot of different information
		var gamecontainer = document.getElementById("footer");
		$(document).ready(function(){
		var htmlString = "";
		$.get("https://api.rawg.io/api/games?page_size=30&ordering=-rating&dates=2019-11-01,2021-03-31&key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data, status){
			for(var i=1;i<=10;i++){
				var id = data.results[i].id;
				$.get("https://api.rawg.io/api/games/" + id + "?key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data2, status){
						console.log("Data: " + data2.name + "\nStatus: " + status); 
						var genress = "";
						for(var j=0;j<data2.genres.length;j++){
							genress += data2.genres[j].name;
							if(j<data2.genres.length-1){
								genress+=", ";
							}
						}
						htmlString="";        
						htmlString += 
								'<div id="character_dis">' +
								'<h2><u>' + data2.name + '</u></h2>' + 
								'<img src=' + data2.background_image + ' width="960" height="540">' +
								'<div class="testing">'+
								'<p><u>Release Date:</u> <bold>' + data2.released +'</bold></p>' +
								'<p><u>Genre:</u> <bold>' + genress +'</bold></p>' +
								'<p><u>Description:</u><br></p>' +
								'</div>' +
								'<p>' + data2.description +'</p>' +
								// '<div id="trailer">' +
								// 	'<iframe width="1280" height="720" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'+ 
								// '</div>' +
								'</div>';
								//console.log(data2.youtube.external_id);
								gamecontainer.insertAdjacentHTML('beforebegin',htmlString);
								$("#loading").hide();
					});
				}
			});
		});
	</script>
</body>
</html>