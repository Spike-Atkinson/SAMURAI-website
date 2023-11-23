<?php include 'inc/header.php'; 
include 'inc/lib.php';
// Connect to the database
connect();
$product = $_GET['product'];
$sql = "SELECT * FROM products WHERE ID = ".$product;
$result = mysqli_query($conn, $sql);

// Loop through the rows
while($row = mysqli_fetch_assoc($result)) {
	// output data of each row
	$id = $row["ID"];
	$name = $row["name"];
	$desc = $row["description"];
	$type = $row["type"];
	$date = $row["published"];
	$source = $row["img"];
	
			}
			
session_start();
?>


<body>
<?php include 'inc/navbar.php';?>

<!--Back button-->
<a href="merch.php"><img class="back" src="images/back-button-store.png" alt="Back to Store"></a>


	<!-- horizontal space that contains image and description-->
<div class="descriptionrow">
	<!--image of product-->
	<div class="image">
		<img id="image" <?php echo "src = ". $source; echo " alt='an image of ".$name."'";?> >
	</div>
	<!--title-->
	<?php echo "<h1>".$name."</h1>"; ?>
	<!--description-->
	<div class="information">
		<div class="description">
			<?php echo "<p>".$desc."</p>
			<p>Product ID: ".$id."<br/>
			Category: ".$type."<br/>
			Date Added: ".$date."</p>";?>
		</div>
		
		</form>
		<!--Add button, for adding to basket-->
		<a <?php echo 'href="basket.php?basket=True?add='."'".$id."'".'"'; ?>>
		<div class="add">
			<p class="addTxt">Add</p>
		</div> </a>
	</div>
</div>	
			
<!--Copyright/update footer-->
<?php include 'inc/footer.php';?>
</body>

</html>