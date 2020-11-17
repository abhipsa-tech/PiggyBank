<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Piggy Bank Registration</title>
	<link rel="stylesheet" type="text/css" href="myStyle.css">
    <link type="text/javascript" href="myScript.js">
</head>
<script type="text/javascript">
	window.onload = setInterval(clock,1000);

    function clock()
    {
      var d = new Date();
      
      var date = d.getDate();
      
      var month = d.getMonth();
      var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
      month=montharr[month];
      
      var year = d.getFullYear();
      
      var day = d.getDay();
      var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      day=dayarr[day];
      
      var hour =d.getHours();
      var min = d.getMinutes();
      var sec = d.getSeconds();
    
      document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
      document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }
</script>
<body>

	 <span id="datetime">  
        <p id="date"></p> 
        <p id="time"></p>
    </span>
	

	<div class = "container">
		<h2 >The is Your Registraion Page</h2>
		
		<form action ="register.php" method = "POST">
			Enter Full Name: <input type = "text" name = "fullname" pattern="[a-zA-Z\s]+" title="Full name must contain letters only" placeholder="fullname" required = "required"/><br/>
			Enter 4-Digit Account Number: <input type = "text" name = "account" placeholder="account number" title="account number" required = "required"/><br/>
			Enter Mobile Number:<input type="tel" name="tel" pattern="[0-9]{3}[0-9]{4}[0-9]{3}" maxlength="10" placeholder="10-numbers" title="10 numeric digits only" required="required"><br/>
			Enter Email Id:<input type="email" name="email" placeholder="email" title="email" required="required"><br/>
			Enter Username : <input type = "text" name = "username" placeholder="username" title="username" required = "required"/><br/>
			Enter Password : <input type = "password" name = "password" placeholder="password" title=" min length must be 6" pattern="^\S{6,}$" required = "required"/><br/>
			Gender: <input type="radio" value="female" name="gender">Female
					<input type="radio" value="male" name="gender">Male
					<input type="radio" value="other" name="gender">Other<br/>
			Secret Code:<?php $code = rand(1000,9999);echo '<p style="color:black;display:inline;background-color:yellow;">'.$code.'</p>'; ?><br/>
			Enter Secret Code:  <input type = "text" name = "secretcode" placeholder="secretcode" title="same as above" required = "required"/><br/>
			<br/>
			<input type = "submit" name="submit" value = "Register" class = "button"/><br/><br/>
			<a href = "index.php"> Click Here To Go Back.</a><br/>
			</form>	
	</div>


</body>
</html>

<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$fullname = $_POST['fullname'];
		$account = $_POST['account'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];	
		$gender = $_POST['gender'];
		$secretcode = $_POST['secretcode'];

		$bool=true;

		$conn = mysqli_connect("localhost","root","") or die(mysql_error());
		mysqli_select_db($conn,"account_details") or die("Cannot connect to database");
		$query=mysqli_query($conn,"SELECT * FROM user_details");	
		while($row = mysqli_fetch_array($query))
		{
			$table_user = $row['username'];
			if($username == $table_user)
			{
				$bool=false;
				Print '<script>alert("Username has already been taken!");</script>';
				Print '<script>window.location.assign("register.php");</script>';
			}
		}
		if($bool)
		{
			mysqli_query($conn,"INSERT INTO user_details (account_number,fullname,username,password,secret_code,gender,mobile_number,email_address) VALUES ('$account','$fullname','$username','$password','$secretcode','$gender','$mobile','$email')");
			Print '<script>alert("Successfully Registered! ");</script>';
			Print '<script>window.location.assign("index.php");</script>';
		}
	}
?>