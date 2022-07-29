<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/style.css">
    <title>Add Product</title>
  </head>
  <body>
		<div class="container">
		<?php
        include('PHP/header.php');
        ?>
			<br>
            <form action="/PHP/ProcessNewProduct.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product QEZ31075" required>
                    <label for="category">Category:</label>
                    <br>
                    <select class="form-control select2bs4" name="category" id="category" style="width: 100%">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="6891.4" required>
                    <label for="id">ID:</label>
                    <input type="text" id="ID" class="form-control" name="id" value="" required><br>
                    <label class="alert alert-danger" id="message" style="display: none;"></label><br>
                    <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>    
            </form>
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
        <script src="/JS/addProduct.js" type="text/javascript"></script>
	</body>
</html>