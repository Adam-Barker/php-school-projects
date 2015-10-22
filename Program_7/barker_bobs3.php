<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment SuperSite</title>
</head>
<body>
<?
//FILE : barker_bobs3.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs2.html
	extract($_POST);
	session_start();
	$total = 0;
	$department = $_SESSION['mediaType'];
	echo "<h1>Bob's Entertainment SuperSite</h1><br>";
	echo "<h1>$department</h1>";
	if(isset($choice)){
		foreach($choice as $key => $value){
			$total += $value;
		}
		echo "<h2>Thank you for your choices! Your total amount due is $$total!</h2>";
	}
	else{
		echo "<h1 align='center' style='color:RED'> You didn't make any choices!</h1>";
		echo "<p align='center'>Please press back and make a choice!</p>";
	}
?>
</body>
</html>