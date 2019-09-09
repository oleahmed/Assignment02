<?php

$pdo = new PDO("mysql:host=localhost;dbname=crud256", "root", "");

$del_id = $_GET['id'];
//update section
if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['num'];
	$address = $_POST['address'];

	$q = "UPDATE mobiles SET name='$name',email='$email',number='$number',address='$address' WHERE id='$del_id'";
	$statement = $pdo->prepare($q);
	$statement->execute();
	header("location:index.php");
}


//getData
$get_data_sql = "SELECT * FROM mobiles WHERE id='$del_id'";
$get_statement = $pdo->prepare($get_data_sql);
$get_statement->execute();
$result = $get_statement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
			<?php
				foreach($result as $value){
			?>
			<form class="form-group" method="POST" action="">
				<input class="form-control" type="text" name="name" value="<?php echo $value['name'] ?>"><br>
				<input class="form-control" type="text" name="email" value="<?php echo $value['email'] ?>"><br>
				<input class="form-control" type="number" name="num" value="<?php echo $value['number'] ?>"><br>
				<input class="form-control" type="text" name="address" value="<?php echo $value['address'] ?>"><br>
				<input class="btn btn-success" type="submit" name="submit" value="update">
			</form>
			<?php
				}
			?>

</body>
</html>