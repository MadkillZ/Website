<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trending</title>
	<meta charset="utf-8">
	<meta name="author" content="Francois Viviers">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<?php
	include 'php/header.php'
	 ?>
	<div class="featured_txt">
			<div class="example">
			  <input type="text" placeholder="Search.." name="search" id="search">
			  <button id="searching"><i class="fa fa-search"></i></button>
			</div>
		</div>
		<!-- <div id="character_neww">
			<input type="radio" id="month" name="filter" value="Month" checked="checked">
			<label for="male"> Month (2020 Only)</label>
			<input type="radio" id="year" name="filter" value="Year">
			<label for="female">Year</label>
			<input type="text" placeholder="If Months(1-12), If Years(2021,2013..)" id="filter"><br>
			<button id="filtered">Filter</button>
		</div>
	<div id="content">
		<div id="feature">
			<h1 class="color">Trending:</h1>
			<h1><img src=pictures/gta5.jpg alt="GTA 5 Poster"></h1>
			<div class="featured_txt">
				<h1 class="color">Take a look at the trending games of the week!!</h1>
			</div>
		</div>
		<div class="article col1">
			<h2><u>Grand Theft Auto V</u></h2>
			<p><bold>Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the first main entry in the Grand Theft Auto series since 2008's Grand Theft Auto IV. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and arms smuggler Trevor Philips—and their efforts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas' open countryside and the fictional city of Los Santos, based on Los Angeles.</bold>
			<br><br>
			<u>Developer:</u> <bold>Rockstar studios</bold>
			<br><br>
			<u>Release Date:</u> <bold>17 September 2013</bold>
			<br><br>
			<u>Rating:</u> <bold>97%</bold>
			<br><br>
			<u>Genre:</u> <bold>Action/Adventure/Third-Person shooter</bold>
			<br><br>
			<u>Platform:</u> <bold>PlayStation 4, Xbox One, PlayStation 3, Xbox Series X and Series S,<br> Xbox 360, Microsoft Windows, PlayStation 5</bold>
			<br><br>
			<u>Tags:</u> <bold>Openworld/Shooter/Roleplay</bold></p>
		</div>
		<div class="article col2">
			<h1 class="color">Hottest content of the week!</h1>
				<div class="hot">
						<a><img src="pictures/the-last-of-us-2-key-art-ellie-logo.jpg" alt="Last of us 2"></a>
						<div class="text"><h4>THE LAST OF US 2</h4></div>
				</div>
				<div class="hot">
						<a><img src="pictures/doom_eternal.jpg" alt="Doom Eternal"></a>
						<div class="text"><h4>DOOM ETERNAL</h4></div>
				</div>
				<div class="hot">
						<a><img src="pictures/F1_2020.png" alt="Formula one 2020"></a>
						<div class="text"><h4>F1 2020</h4></div>
				</div>
				<div class="hot">
						<a><img src="pictures/hitman3.png" alt="Hitman 3"></a>
						<div class="text"><h4>HITMAN 3</h4></div>
				</div>
				<div class="hot">
						<a><img src="pictures/rdr2.jpg" alt="Red Dead Redemption 2"></a>
						<div class="text"><h4>RED DEAD REDEMPTION 2</h4></div>
				</div>
		</div>	
	</div> -->
	<div id="loading">
		<img src="pictures/spinner.gif"></img>
	</div>
	<div id="footer">
		<p>Francois Viviers</p>
	</div>
	<div id="footer"><button id="togglebtn">Light/Dark</button></div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
	//alert("TEST");
	//I made use of synchronous calls because when using RAWG you need to use the id of individual games to get access to a lot of different information
		$(document).ready(function(){
			$("#loading").hide();
				$("#loading").show();
				var gamecontainer = document.getElementById("footer");
				var yearR = "=metacritic";
				if (getCookie("pref")=="Asc"){
					yearR = "=metacritic";
					//alert('Asc');
    			}
				if (getCookie("pref")=="Desc"){
					yearR = "=-metacritic";
					//alert('Desc');
    			}
				$("[id*=character_dis]").remove();
				//console.log(filterR);
				var htmlString = "";
				$.get("https://api.rawg.io/api/games?page_size=30&ordering"+ yearR +"&key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data, status){
					//console.log(searchR);
					for(var i=1;i<=20;i++){
						var id = data.results[i].id;
						$.get("https://api.rawg.io/api/games/" + id + "?key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data2, status){
							if(status=="success"){
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
										'<p><u>Release Date:</u> <bold>' + data2.released +'</bold></p>' +
										'<p><u>Genre:</u> <bold>' + genress +'</bold></p>' +
										'<p><u>Metacritic Ranking:</u> <bold>' + data2.metacritic +'</bold></p>' +
										'<p><u>Platforms:</u> <bold>' + platformss +'</bold></p>' +
										'</div></div>';
										gamecontainer.insertAdjacentHTML('beforebegin',htmlString);
										$("#loading").hide();
							}
							});
						}
					});	
			//searching
			$("#searching").click(function(){
				$("#loading").show();
				var gamecontainer = document.getElementById("footer");
				var searchR = document.getElementById("search").value;
				if(searchR==""){
					alert("Search is empty");
					return;
				}
				$("#content").hide();
				$("[id*=character_dis]").remove();
    			
				var htmlString = "";
				$.get("https://api.rawg.io/api/games?page_size=30&ordering=-metacritic&metacritic=10,100&search="+ searchR +"&search_exact&key=7da2ce5bfa5d4c0dbc6e02d906b9387a&20", function(data, status){
					console.log(searchR);
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
							});
						}
					});
			});
		});
	</script>
</body>
</html>