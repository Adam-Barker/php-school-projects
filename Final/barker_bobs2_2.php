<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment Universe</title>
</head>
<body>
<?
//FILE : barker_bobs1.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs1 if searchbox is used

	extract($_POST);
	session_start();

	$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

	if(!$link) 
		die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());
	
	else{
	echo "<form method='post' action='barker_bobs3.php'>";
	echo"<table align='center'>";
	
		echo "<h1 align = 'center'>Bob's Entertainment Universe</h1><br>
			 <h1 align='center'>Entertaner/Author</h1><br>
			 <h2 align='center'>Please make a selection from the following</h2><br>
			 <tr>
			 	<td></td>
			 	<td><h2>ID</h2></td>
			 	<td><h2>Entertainer/Author</h2></td>
			 	<td><h2>Title</h2></td>
			 	<td><h2>Media</h2></td>
			 	<td><h2>Feature</h2></td>";
		$resultSet = mysqli_query($link, "SELECT ID, entertainerauthor, title, media, feature
			FROM products WHERE entertainerauthor LIKE '%{$search}%' ORDER BY entertainerauthor");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>
			<td align><input type='checkbox' name = 'choice[]'' value ='{$row['ID']}'</td>"; 
			foreach($row as $value){
				echo "<td width ='250'>$value&nbsp&nbsp</td>";
			}
			echo "</tr>";	
		}
	
	echo "<tr>
			<td></td>
			<td><input type='submit' value='Submit'>
		  	<input type='reset' value = 'Clear'></td></tr>
		</table>
	</form>";
}
mysqli_close($link);
?> 
</body>
</html>