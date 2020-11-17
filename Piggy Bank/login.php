<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Piggy Bank Login</title>
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
<body>

	<span id="datetime">  
        <p id="date"></p> 
        <p id="time"></p>
    </span>

	<div class="container">
		<h2 >This is Your Login Page</h2>
		<br/>
		<form action="checklogin.php" method="POST">
			Enter Username : <input type="text" id="username" name="username" title="username" placeholder="username" required="required"/><br/>
			Enter Password : <input type="password" id="password" name="password" title="password" placeholder="password" required="required"/><br/>
			<br/>
			<input type="submit" value="Login" class="button"/>
		</form>	
		<br/>
		<a href="index.php">Click Here To Go Back</a><br>
	</div>

</body>
</html>