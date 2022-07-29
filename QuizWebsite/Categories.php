<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="icon" type="image/png" href="pictures/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	include 'php/header.php'
	?>
	<br>
	<div class="container text-white">
        <div class="row">
            <div class="col-md-6">
                <form action='./Categories.php' method='POST' enctype='multipart/form-data'>
                    <div class="card">
                        <div class="card-body">
                            <h2>Add Category:</h2>
                            <input type="text" name="newCategory"/>
                            <input type="submit" value="Add Category"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <h2>Categories:</h2>
                            <select class="form-select" aria-label="Default select example">
                                <?php
                                 $mysqli = OpenCon();
                                 $records = mysqli_query($mysqli, "SELECT * FROM categories");
                                 while ($data = mysqli_fetch_array($records)) {
                                    $CatName = $data['name'];
                                    echo '<option value="'. $CatName .'">';
                                    echo $CatName;
                                    echo '</option>';
                                 }
                                ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>

<?php 
    $mysqli = OpenCon();
    if(isset($_REQUEST['newCategory'])){
        $category = mysqli_real_escape_string($mysqli,$_REQUEST['newCategory']);
        $sql = "INSERT INTO categories (name) VALUES ('$category')";
        if($mysqli->query($sql) === true){
            //echo "Records inserted successfully.";
        } else{
            //echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
    }
    CloseCon($mysqli);
?>