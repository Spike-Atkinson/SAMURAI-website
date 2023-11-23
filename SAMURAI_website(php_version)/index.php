<?php include 'inc/header.php'; ?>

<body id="index">
<!--white "Samurai" text logo-->
<img id="title" src="images/SAMURAI-medium-05.png" alt="Samurai text logo">

<!--The horizontal space that contains the following:-->
<div class="row">

<!--Left two buttons. "Bio" and "Music"-->
	<div class="left-column">
			<a href="bio.php">
				<img class="button" src="images/bio-button.png" alt="Bio"> </a> 
			<a href="music.php">
				<img class="button" src="images/music-button.png" alt="Music"> </a> 
	</div>	
	
<!--Central Oni mask logo-->			
	<div class="face-column">
		<img id="face" src="images/face-small.png" alt="Oni Samurai logo">
	</div>
	
<!--Right two buttons "Store" and "Contact Us"-->		
	<div class="right-column">
			<a href="merch.php">
			<img class="button" src="images/store-button.png" alt="Merch"> </a> 
			<a href="contactus.php">
			<img class="button" src="images/contact-us.png" alt="Contact Us"> </a> 
	</div>
</div>

<!--Copyright/update footer-->
<?php include 'inc/footer.php';?>
</body>
</html>