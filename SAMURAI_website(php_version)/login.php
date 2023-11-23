<?php 
// Add the HTML header 
include "inc/header.php"; 
?>

<body>
<?php 
// Include the library file that contains the database connection and custom functions
include('inc/lib.php');

// Connect to the database
connect();

// Start the user session
session_start();
$_POST['login'] = True;
include 'inc/navbar.php';
include 'inc/back-store.php'; ?>


<?php



// Get the SESSION superglobal variable
$userkey = $_SESSION['user_id'];

// If we're logging out then clear the session the cookie
if( $_REQUEST["action"] == "logout" ){
    session_destroy(); // Get rid of the session
	header("Location: login.php"); // Redirect to the index page
	exit; // Stop doing anything else on this page
}

if ( $userkey == "" ) { // The user hasn't got a session running so they are not logged in 

	if ( $_POST['username_reg'] != "" && $_POST['password_reg'] != "" ) { // User is trying to register

		// Set the variables
		$username_reg = $_POST['username_reg'];
		$password_reg = md5($_POST['password_reg']); // Encrypt the password to MD5
		
		// Insert the user into the table
		$sql = "INSERT INTO users (username, password, firstname, lastname) 
					VALUES ('$username_reg', '$password_reg', '', '')";

		// Run the query
		mysqli_query($conn, $sql);
		
		// Get the id of the row we just inserted (this is the new user_id
		$user_id_new = mysqli_insert_id($conn);

		// Tell the user what happened
		if ( $user_id_new != "" ) {
		  echo "Account created successfully!<br/><br/>";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		// Set the session variables
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $user_id_new;	

		// Set the $userkey so we are now logged in
		$userkey = $user_id_new;

		
	} elseif ( $_POST['username'] != "" && $_POST['password'] != "" ) { // User is trying to login
	
		// Set the variables
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Retreive any user with the same username
		$sql = "SELECT id, password FROM users WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		
		// Loop through the rows
		while($row = mysqli_fetch_assoc($result)) {
			
			// Account exists, now we verify the password.
			if ( $row['password'] == md5($password) ) {
				
				// Verification success! Create the user session variables
				$_SESSION['username'] = $username;
				$_SESSION['user_id'] = $row['id'];
				
				// Tell the user
				echo 'Welcome back ' . $_SESSION['username'];
				
				// Stop the loop because we found a user
				break;
				
			} 
		}
		
		// Set the $userkey to the page knows we're logged in 
		$userkey = $_SESSION['user_id'];
		
	} 
}

if ( $userkey == "" ) { // We are not logged in so show the login form
	?>

<!-- Login area -->
	<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
		<div class="logreg">
			<b>LOGIN</b><br/>
			<label for="username">Username:</label><br>
			<input type="text" id="username" name="username" value=""><br>
			<label for="password">Password:</label><br>
			<input type="password" id="password" name="password" value=""><br>
		</div>
		<p id="noAcc">Don't have an account?<br/> Register below.</p>
<!-- Register area -->
		<div class="logreg">
			<b>REGISTER</b><br/>
			<label for="username_reg">Username:</label><br>
			<input type="text" id="username_reg" name="username_reg" value=""><br>
			<label for="password_reg">Password:</label><br>
			<input type="password" id="password_reg" name="password_reg" value=""><br>
			<br/><br/>
			<input type="submit" value="Submit">
		</div>
	</form>
</div>

	<?php
} else { // We are logged in so show the rest of the page
	
	echo "<p>Congratulations! You are logged in. Now you can <a href=\"login.php?action=logout\"><b>Logout</b></a></p>";
    
}

// Close the database connection
mysqli_close($conn);
?>

<!--Copyright/update footer-->
<?php include 'inc/footer.php';?>

</body>
</html>