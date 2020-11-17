<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Piggy Bank</title>
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
    <head id="title">
      <br/>
      <marquee behaviour="slide" direction = "left" hspace="300" bgcolor = "yellow"><p style="color:black;font-weight: bold;">WELCOME, THIS IS YOUR PIGGY BANK</p></marquee>
    </head>
     

    <div class="container">
      
    <h4>New to Piggy Banking then REGISTER</h4>
    

    <button type="button" onclick="location.href='login.php'" class="button" title="Already Registered Login Here">LOGIN</button><br/>
    

    <button type="button" onclick="location.href='register.php'" class="button" title="New User Register Here">REGISTER</button><br>

    </div>

    <span class="copyright">
        <p><b>Piggy Bank by Abhipsa Mayee Maharana &copy; <?php echo date("Y"); ?></b></p>
    </span>


</body>
</html>