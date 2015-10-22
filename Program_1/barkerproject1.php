<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Charleston</title>
</head>
<body>
    <h1>Charleston Sunrise/Sunset</h1>
     <?php
       //FILENAME: barkerproject1.php
       //PROGRAMMER: Adam Barker
       //PURPOSE: Displays sunrise and sunset times for Charleston

       echo "On today's date, ", date("m/d/Y"), ', sunrise was at '
       .date_sunrise(time(), SUNFUNCS_RET_STRING, 33, -80, 90, -5),
       ' and sunset will be at '
       .date_sunset(time(), SUNFUNCS_RET_STRING, 33, -80, 90, -5),'.';
     ?>
</body>
</html>

