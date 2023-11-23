<?php 
//includes
include 'inc/header.php'; 
include "inc/lib.php"; ?>

<body>
<?php 
//start session
session_start();

// Create connection to database
connect();
//navbar included later as it requires database connection for basket item counter
include 'inc/navbar.php';
include 'inc/back-store.php';?>


<!--Basket-->
<div class="wholeBasket">

<?php //fills basket with products the users basket (basket table in database)
$sql = "SELECT * FROM products, basket WHERE basket.id = ".$_SESSION['user_id']." AND basket.product = products.ID";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){

		if ($_GET['add'] == $row['product'] ){
			$update = "UPDATE basket SET quantity =".($row['quantity'] + 1)."WHERE product =".$_GET['add'];
			if (mysqli_query($conn, $update)) {
				echo "Record updated successfully!<br/><br/>";
			} else {
				echo "Error updating record: " . mysqli_error($conn);
				}
			
		}
		// output data of the row
		echo "<!--image, quantity, and removal option for first item in basket-->
		<div class='basketItem'>
			<img class='basketImage' src='".$row['img']."' alt='".$row['name']."'>
			<p class='basketItemName'>".$row['name']."</p>
			<form>
				<label class='basketQuantity' for='quantity".row['ID']."'>Quantity</label>
				<input type='number' class='basketQuantity' id='quantity".$row['ID']."' min='1' max='99' value='".$row['quantity']."' >
				<label class='remove' for='remove".$row['ID']."'>Remove</label>
				<input type='checkbox' class='remove' id='remove".$row['ID']."'>
			</form>
		</div>";
}

?>

		<!--update button for quantity and removal-->
		<a action= >
			<div id="update">update</div> </a>
		<!--checkout button-->	
		<a href="">
			<img id="checkout" src="images/checkout.png" alt="Checkout Button"> </a>
	
</div>

<!--Copyright/update footer-->
<?php include 'inc/footer.php';

mysqli_close($conn);?>
</body>

</html>