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
		<h2 >This is Your Deposit Page</h2>
		<h3> Welcome to e-Banking <?php Print "$user" ?></h3>
		<br/>
		<form action="add.php" method="POST">
			Enter Amount: <input type="number" name="amount" min=1 placeholder="amount" required="required"/><br/>
			Enter Secretcode :  <input type = "text" name = "secretcode" placeholder="secretcode" title="" required = "required"/>
			<br/><br/>
			<input type="submit" class="button" value="Deposit Money"/>
		</form>
		<br/>
		<a href="home.php" >Click Here to Go Back.</a><br/>
	</div>


</body>
</html>