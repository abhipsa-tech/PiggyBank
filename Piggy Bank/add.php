<?php 
	session_start();
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}

	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$credit = $_POST['amount'];
		$secret_code = $_POST['secretcode'];
		$particulars = 'By Deposit';
		$bool=true;

		$conn = mysqli_connect("localhost", "root","") or die(mysql_error()); 
		mysqli_select_db($conn,"account_details") or die("Cannot connect to database"); 
		$sql = mysqli_query($conn,"SELECT * FROM user_details WHERE username='$user'");
		while($row = mysqli_fetch_array($sql))
		{
			$code = $row['secret_code'];
			if ( $secret_code != $code  )
			{
				$bool=false;
				Print '<script>alert("Entered wrong secretcode.");window.location.assign("deposit.php");</script>';
			}
		}
		
		if($bool)
		{
			$balance = 0.00;
			$query = mysqli_query($conn,"SELECT * from transaction_details WHERE user='$user'");
			while($row = mysqli_fetch_array($query))
			{
				$amount = $row['credit'] - $row['debit'];
				$balance =$balance + $amount;
			}
			$balance = $balance + $credit;
			mysqli_query($conn, "INSERT INTO transaction_details (user,particulars,credit,amount) VALUES ('$user','$particulars','$credit','$balance')");
			Print '<script>alert("Successful Deposit Made.");window.location.assign("balance.php");</script>';
		}		
	}

	else
	{
		header("location:home.php");
	}


 ?>
