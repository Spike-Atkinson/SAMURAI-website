<!--"samurai" home button-->
<a href="index.php"> <img class="samuraibutton" src="images/logobutton.png" alt="Home button"> </a> 
<?php
$sql = "SELECT count(*) FROM basket WHERE basket.id = ".$_SESSION['user_id'];
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
	$basket = $row['count(*)'];
}

?>
<!--navbar-->
<ul class ="navbar">
<li class="navElement">

<!--Basket-->
	<a href="basket.php?basket=True" class="basket">
<?php 
if ($_GET['basket'] == True) {
	echo "<div class='current' >"; 
	}else{
		echo "<div class='basket' >";
}
	 echo "Basket <div class='counter'><b>".$basket."</b></div></div>";?>
</a></li>

<!--login-->
<li class="navElement">
	<a href="login.php?login=True" class="login">
<?php 
if ($_GET['login'] == True) {
	echo "<div class='current' >"; 
	}else{
		echo "<div class='login' >";
} 
echo "Login</div></a></li>";
?>
</ul><br/>


