<?php

$pdo = new PDO("mysql:host=localhost;dbname=crud256", "root", "");


if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['num'];
	$address = $_POST['address'];

	// insert begins
	$q = "INSERT INTO mobiles (name,email,number,address) VALUES ('$name','$email','$number','$address')";
	$statement = $pdo->prepare($q);
	$statement->execute();
	echo "Saved Data";

	// insert end
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>db form</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="row">
		<div class="col-12" style="padding-top: 100px; margin: 0px 20px">


	<form class="form-group" method="POST" action="">
		
		<input class="form-control" type="text" name="name">
		<input class="form-control" type="text" name="email">
		<input class="form-control" type="number" name="num">
		<input class="form-control" type="text" name="address">
		<input class="btn btn-primary" type="submit" name="submit" value="save">
	</form>

	

<?php
//getdata
$get_data_sql = "SELECT * FROM mobiles";
$get_statement = $pdo->prepare ($get_data_sql);
$get_statement->execute();
$result = $get_statement->fetchAll();


?>

<table border="1" style="width:100%" class="text-center">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Number</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
		<?php
			foreach ($result as $value) {
			
		?>

		<tr>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['number']; ?></td>
			<td><?php echo $value['address']; ?></td>
			
			<td> <a class="btn btn-success btn-sm" href="update.php?id=<?php  echo $value['id']; ?>">update</a>||<a class="btn btn-danger btn-sm" href="delete.php?delete=<?php echo $value['id'];?>">Delete</a></td>
		</tr>

		<?php
			}
		?>
	</table>
	</div>
</div>


</body>
</html>
