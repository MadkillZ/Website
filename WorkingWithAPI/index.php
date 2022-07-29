<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/style.css">
	<title>Landing Page</title>
  </head>
  <body>
		<div class="container">
		<?php
			include('PHP/header.php');
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
			<div class="input-group">
				<input type="search" name="searchVal" id="searchVal" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
				<button type="button" id="searchBtn" class="btn btn-primary">search</button>
			</div>
			</div>
		</div>
		
			<div class="Items"></div>
			<br>
			<div class="row">
				<div class="col-md-6 bg-light text-left">
					<button class="btn btn-primary" id="previous" style="display: none;">Previous</button>
				</div>
				<div class="col-md-6 bg-light text-right">
					<button class="btn btn-primary" id="next">Next</button>
				</div>	
			</div>
			
			
			<br>
			<?php
				include('PHP/footer.php');
			?>
		</div>
		<script
			src="https://code.jquery.com/jquery-3.6.0.js"
			integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="/JS/API.js" type="text/javascript"></script>
		<script src="/JS/HomePage.js" type="text/javascript"></script>
	</body>
</html>