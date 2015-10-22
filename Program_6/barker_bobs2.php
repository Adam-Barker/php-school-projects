<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?
//FILE : barker_bobs2.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs1.html
	extract($_POST);
	session_start();
	if($_SESSION['mediaType']=="Videos")
		echo"<h1>Videos</h1>";
	if($_SESSION['mediaType']=="Books")
		echo"<h1>Books</h1>";
	if($_SESSION['mediaType']=="Music")
		echo"<h1>Music</h1>";
	if(isset($choice)){
		echo "<h2> These are your choices!</h2>";
		foreach($choice as $value){
			echo "$value<br>";
		}
	}
	else{
		echo "<h1 align='center' style='color:RED'> You didn't make any choices!</h1>";
		echo "<p align='center'>Please press back and make a choice</p>";
	}
?>
</body>
</html>