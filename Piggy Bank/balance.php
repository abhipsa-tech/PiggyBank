<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Piggy Bank Home</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css">
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

	<?php
		session_start();
		if($_SESSION['user'])
		{}
		else
		{
			header("location:index.php");
		}
		$user=$_SESSION['user'];
		?>
<body>

	<span id="datetime">  
        <p id="date"></p> 
        <p id="time"></p>
    </span>

	<div class="container">
		<h2 >The Balance Page</h2>
		<h3> Hello <?php Print "$user" ?></h3>
		<?php 
			$conn = mysqli_connect("localhost","root","") or die(mysql_error());
			mysqli_select_db($conn,"account_details") or die("Cannot connect to database");
			$balance = 0.00;
			$query = mysqli_query($conn,"SELECT * from transaction_details WHERE user='$user'");
			while($row = mysqli_fetch_array($query))
			{
				$row['amount'] = $row['credit'] - $row['debit'] ;
				$balance =$balance + $row['amount'];
			}

			Print "<strong><font color=\"black\">Your Balance is : Rs. {$balance} </font></strong>";

		 ?>
		 <br/>
		 <br/>
		 <br/>
		 <a href="home.php" >Click Here to Go Back.</a><br/>

	</div>

</body>
</html>