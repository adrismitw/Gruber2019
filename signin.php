<?php
	
	$username=""; // Mysql username
	$password=""; // Mysql password
	$db_name="id11725044_grubergrocery"; // Database name
	$tbl_name="Customer"; // Table name

	// Connect to server and select databse.
	$con = mysqli_connect("localhost", "id11725044_grubergrocery", "SEfinal@450");
	if(!$con){
	    
	    die("Could not connect: ".mysql_error());
	    
	}
	mysqli_select_db($con, "id11725044_grubergrocery")or die("cannot select DB");

	// username and password sent from form
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type= $_POST['Type'];

	// To protect MySQL injection (more detail about MySQL injection)
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($con, $username);
	$password = mysqli_real_escape_string($con, $password);

	$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password' and Type='$type'";
	$result=mysqli_query($con, $sql);

	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count==1){
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		//session_register("username");
		//session_register("password");
		header("Location: https://gruber-grocery.000webhostapp.com/store.html");
		echo "Log In Success";
		    if($type=='Customer'){
		        echo "Welcome," + $_POST['name'] +"!";
		    }else{
		        echo "Welcome trusted driver," + $_POST['name'] +"!";
		    }
	}
	else {
	    
	
		    header("Location: https://gruber-grocery.000webhostapp.com/index.html");
		    echo "Wrong Username or Password";
		
	}
	mysqli_close($con);
?>
