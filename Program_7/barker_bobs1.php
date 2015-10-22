<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment SuperSite</title>
</head>
<body>
<?
//FILE : barker_bobs1.php
//PROG : Adam Barker
//PURP : Displays proccessed form values of barker_form6.html

	extract($_POST);
	session_start();

	$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

	if(!$link) 
		die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());
	
	else{
	echo "<form method='post' action='barker_bobs2.php'>";
	echo"<table>";
	
		$_SESSION['mediaType'] = $departments;
		echo "<h1 align = 'center'>Bob's Entertainment SuperSite</h1><br>";
		echo "<h1 align='center'>$departments</h1><br>";
		echo "<h2 align='center'>Please make a selection from the following</h2><br>";
		echo "<tr>";
		echo "<td></td>"; 
		echo "<td><h2>ID</h2></td>";
		echo "<td><h2>Entertainer/Author</h2></td>";
		echo "<td><h2>Title</h2></td>";
		echo "<td><h2>Media</h2></td>";
		echo "<td><h2>Feature</h2></td>";
		$resultSet = mysqli_query($link, "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE department = '$departments'");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>";
			echo "<td align><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
			foreach($row as $value){
				echo "<td width ='250'>$value&nbsp&nbsp</td>";
			}
			echo "</tr>";	
		}
	
	echo "</table>";
	echo "<input type='submit' value='Submit'>";
	echo "<input type='reset' value = 'Clear'>";
	echo "</form>";
	mysqli_close($link);
}
?> 
</body>
</html>