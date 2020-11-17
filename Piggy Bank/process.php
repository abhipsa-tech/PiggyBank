<?php 
//sender details
	session_start();
	if($_SESSION['user']){
		$user=$_SESSION['user'];
	}
	else{
		header("location:index.php");
	}

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$debit = $_POST['amount'];
		$account = $_POST['account'];
		$secret_code = $_POST['secretcode'];

		$conn = mysqli_connect("localhost", "root","") or die(mysql_error()); 
		mysqli_select_db($conn,"account_details") or die("Cannot connect to database"); 
		$query = mysqli_query($conn,"SELECT * from user_details WHERE account_number='$account'");

		while($row = mysqli_fetch_array($query))
			{
				$receiver = $row['fullname'];
			}
		$particulars = 'By Transfer To '.$receiver;
		$bool=true;

		

		$sql = mysqli_query($conn,"SELECT * from user_details WHERE username='$user'");
		while($row = mysqli_fetch_array($sql))
		{
			$code = $row['secret_code'];
			if ($code != $secret_code ) 
			{
				$bool=false;
				Print '<script>alert("Entered wrong secretcode.");window.location.assign("transfer.php");</script>';
			}
		}

		if($bool)
		{
			$balance=0.00;
			$query = mysqli_query($conn,"SELECT * from transaction_details WHERE user='$user'");
			while($row = mysqli_fetch_array($query))
			{
				$amount = $row['credit'] - $row['debit'];
				$balance =$balance + $amount;
			}
			if($debit > $balance)
			{
				Print '<script>alert("You do not have sufficient Funds.");window.location.assign("transfer.php")</script>';
				exit("You have insufficient funds!");
				header("location: transfer.php");
			}
			else
			{
				$balance = $balance - $debit;
				mysqli_query($conn, "INSERT INTO transaction_details (user,particulars,debit,amount) VALUES ('$user','$particulars','$debit','$balance')");
				Print '<script>alert("Successful Transfer.");window.location.assign("balance.php");</script>';
				
			}
		}	
	}
	else
	{
		header("location:home.php");
	}


 ?>



<?php
//reciever details 
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
		$account = $_POST['account'];
		$secret_code = $_POST['secretcode'];

		$conn = mysqli_connect("localhost", "root","") or die(mysql_error()); 
		mysqli_select_db($conn,"account_details") or die("Cannot connect to database"); 
		$sql = mysqli_query($conn,"SELECT * FROM user_details WHERE username='$user'");

		while($row = mysqli_fetch_array($sql))
			{
				$sender = $row['fullname'];
				echo $sender;
			}
		$particulars = 'By Transfer from '.$sender;
		$bool=true;

		$query = mysqli_query($conn,"SELECT * FROM user_details WHERE username='$user'");
		while($row = mysqli_fetch_array($query))
		{
			$code = $row['secret_code'];
			if ( $secret_code != $code  )
			{
				$bool=false;
				Print '<script>alert("Entered wrong secretcode.");window.location.assign("transfer.php");</script>';
			}
		}
		
		if($bool)
		{
			$balance = 0.00;
			$query = mysqli_query($conn,"SELECT * from user_details WHERE account_number='$account'");
			while($row = mysqli_fetch_array($query))
			{
				$receiver = $row['username'];
			}
			$query = mysqli_query($conn,"SELECT * from transaction_details WHERE user='$receiver'");
			while($row = mysqli_fetch_array($query))
			{
				$amount = $row['credit'] - $row['debit'];
				$balance =$balance + $amount;
			}
			$balance = $balance + $credit;

			mysqli_query($conn, "INSERT INTO transaction_details (user,particulars,credit,amount) VALUES ('$receiver','$particulars','$credit','$balance')");
			Print '<script>alert("Successful Transfer Made.");window.location.assign("balance.php");</script>';
		}		
	}

	else
	{
		header("location:home.php");
	}


 ?>
 