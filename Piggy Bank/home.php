<!DOCTYPE html>
<html>
<head>
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
		<h2 >This is Your Home Page</h2>
		<h3> Welcome <?php Print "$user" ?></h3>

		<div class="btn-group-left">
		<button type = "button" onclick="location.href='deposit.php'" class="button" >Deposit Money.</button><br/>
		
		<button type = "button" onclick="location.href='withdraw.php'" class="button">Withdraw Money.</button><br/>
	
		<button type = "button" onclick="location.href='balance.php'" class="button" >Check Balance.</button><br/>
		</div>
	    <div class="btn-group-right">
		<button type = "button" onclick="location.href='transfer.php'" class="button" >Money Transfer.</button><br/>

		<button type = "button" onclick="location.href='passbook.php'" class="button" >Passbook Check.</button><br/>

		<button type = "button" onclick="location.href='ministatement.php'" class="button" >Ministatement.</button><br/>
		</div>	
		<br/>
		
		<a href="logout.php" style="text-align: center;" >Logout Here</a>

	</div>

</body>
</html>