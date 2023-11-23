<?php include 'inc/header.php'; 
include('inc/lib.php');?>

<body>
<?php 
// Create connection
connect();
session_start();
include 'inc/navbar.php';?>

<!--Horizontal space for products-->
<div class="merchRow">
<?php 

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){

		// output data of the row
		echo "<!--product-->
		<div class='merchbox'>
			<img id='img' src='".$row['img']."' alt='".$row['name']."'>
			<!--More info button-->
			<a href='description.php?product=".$row['ID']."'><div class='info'> More Info </div></a>
			<!--Add button-->
			<a href='basket.php?basket=True' onclick=''><div class='add'><b>ADD</b></div></a>
		</div>";
}

?>

<!--Copyright/update footer-->
<?php include 'inc/footer.php';?>
</body>
</html>