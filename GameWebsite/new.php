<!DOCTYPE html>
<html lang="en">
	<title>Newly Released</title>
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
	<div id="testinggg"><button id="next">Next</button></div>
	<div id="footer">Francois Viviers</div>
	<div id="footer"><button id="togglebtn">Light/Dark</button></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
		//I made use of synchronous calls because when using RAWG you need to use the id of individual games to get access to a lot of different information
		var counter = 1;
		var gamecontainer = document.getElementById("next");
		$(document).ready(function(){
		
		var htmlString = "";
		$.get("https://api.rawg.io/api/games?page_size=30&dates=2020-10-01,2021-12-31&page=1&metacritic=10,100&key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data, status){
			for(var i=1;i<=20;i++){
				var id = data.results[i].id;
				$.get("https://api.rawg.io/api/games/" + id + "?key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data2, status){
						//console.log("Data: " + data2.name + "\nStatus: " + status);
						//console.log("Data: " + data2.developers[0].name + "\nStatus: " + status); 
						var platformss = "";
						var requirement = "";
						for(var j=0;j<data2.platforms.length;j++){
							platformss += data2.platforms[j].platform.name;
							if(j<data2.platforms.length-1){
								platformss+=", ";
							}
							if(data2.platforms[j].platform.name=="PC"){
								if(!data2.platforms[j].requirements.minimum)
									requirement= data2.platforms[j].requirements.minimum;
								else
									requirement="No Data";
							}
						}
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
								'<p><u>Developer:</u> <bold>' + data2.developers[0].name +'</bold></p>' +
								'<p><u>Genre:</u> <bold>' + genress +'</bold></p>' +
								'<p><u>Metacritic Ranking:</u> <bold>' + data2.metacritic +'</bold></p>' +
								'<p><u>Platforms:</u> <bold>' + platformss +'</bold></p>' +
								'<p><u>Requirements:</u> <bold>' +
								data2.platforms[j].requirements.minimum +
								'</div></div>';
								gamecontainer.insertAdjacentHTML('beforebegin',htmlString);
								//$("[id*=character_dis]").fadeIn(slow);
								$("#loading").hide();
					});
				}
				//next
				$("#next").click(function(){
				$("#loading").show();
				counter++;
				var gamecontainer = document.getElementById("next");
				$("[id*=character_dis]").remove();
				var htmlString = "";
				$.get("https://api.rawg.io/api/games?page_size=30&dates=2020-10-01,2021-12-31&ordering=-metacritic&metacritic=10,100&page="+ counter +"&key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data, status){
					for(var i=1;i<=20;i++){
						var id = data.results[i].id;
						$.get("https://api.rawg.io/api/games/" + id + "?key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data2, status){
								//console.log("Data: " + data2.name + "\nStatus: " + status);
								//console.log("Data: " + data2.developers[0].name + "\nStatus: " + status); 
								var platformss = "";
								var requirement = "";
								for(var j=0;j<data2.platforms.length;j++){
									platformss += data2.platforms[j].platform.name;
									if(j<data2.platforms.length-1){
										platformss+=", ";
									}
									if(data2.platforms[j].platform.name=="PC"){
										if(data2.platforms[j].requirements.minimum!="undefined")
											requirement+= data2.platforms[j].requirements.minimum;
										else
											requirement="No Data";
									}
								}
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
										'<p><u>Developer:</u> <bold>' + data2.developers[0].name +'</bold></p>' +
										'<p><u>Genre:</u> <bold>' + genress +'</bold></p>' +
										'<p><u>Metacritic Ranking:</u> <bold>' + data2.metacritic +'</bold></p>' +
										'<p><u>Platforms:</u> <bold>' + platformss +'</bold></p>' +
										'</div></div>';
										gamecontainer.insertAdjacentHTML('beforebegin',htmlString);
										$("#loading").hide();
										//$("[id*=character_dis]").fadeIn(fast);
										//$('img').imgPreload();
							});
						}
					});
			});
			});
		});
	</script>

</body>
</html>