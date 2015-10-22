<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body>
<?
//FILE : barker_bobs1.php
//PROG : Adam Barker
//PURP : Displays proccessed form values of barker_form6.html
	###OK first, I made the used code, but I didn't want redundant code, so then I made this
	/*	extract($_POST);

	$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");
	if(!$link) 
		die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());
	
	if($departments == "video")
		$query = "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'VHS' OR media = 'DVD'";
	
	if($departments == "book")
		$query = "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'Hardcover' OR media = 'Softback'";
	
	if($departments == "music")
		$query = "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'CD' OR media = 'TAPE'";
	$resultSet = mysqli_query($link, $query); 
	echo "<table>";
	echo "<form method='post' action='barker_bobs2.php>";
	while($row = mysqli_fetch_assoc($resultSet)){
		echo "<tr>";
		echo "<td><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
		foreach($row as $value){
				echo "<td>$value&nbsp&nbsp</td>";			
			}
		echo "</tr>";
	}
	echo "<input type='submit' value='submit'>";
	echo "</form>";
	echo "</table>";*/

	## for some reason it wouldn't make the first check box though, even though the code is 
	## essentially the same but truncated. I like this cleaner code better but I couldn't get 
	## it to work so I aplogize for the redundancy.
	extract($_POST);
	session_start();

	$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

	if(!$link) 
		die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());
	
	else{
	echo "<form method='post' action='barker_bobs2.php'>";
	echo"<table>";
	if($departments == "video"){
		$_SESSION['mediaType'] = "Videos";
		echo "<h1 align='center'>Videos</h1><br>";
		echo "<h2 align='center'>Please make a selection from the following</h2><br>";
		$resultSet = mysqli_query($link, "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'VHS' OR media = 'DVD'");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>";
			echo "<td><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
			foreach($row as $value){
				echo "<td width ='250'>$value&nbsp&nbsp</td>";;
			}
			echo "</tr>";
		}
	}
	
	if($departments == "book"){
		$_SESSION['mediaType'] = "Books";
		echo "<h1 align='center'>Books</h1><br>";
		echo "<h2 align='center'>Please make a selection from the following</h2><br>";
		$resultSet = mysqli_query($link, "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'Hardcover' OR media = 'Softback'");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>";
			echo "<td><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
			foreach($row as $value){
				echo "<td width ='250'>$value&nbsp&nbsp</td>";
			}
			echo "</tr>";
		}
	}
	
	if($departments == "music"){
		$_SESSION['mediaType'] = "Music";
		echo "<h1 align='center'>Music</h1><br>";
		echo "<h2 align='center'>Please make a selection from the following</h2><br>";
		$resultSet = mysqli_query($link, "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE media = 'CD' OR media = 'TAPE'");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>";
			echo "<td><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
			foreach($row as $value){
				echo "<td width ='250'>$value&nbsp&nbsp</td>";			
			}
			echo "</tr>";
		}
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