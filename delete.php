
<?php
$pdo = new PDO("mysql:host=localhost;dbname=crud256", "root", "");
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$del_q = "DELETE FROM mobiles WHERE id='$id'";
	$del_st = $pdo->prepare($del_q);
	$del_st->execute(); 
	header("location:index.php?delSuccc=1");
}
?>