<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment Universe</title>
</head>
<body>
<?
//FILE : barker_bobs1.php
//PROG : Adam Barker
//PURP : Displays proccessed form values of barker_fp.html
$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

	if(!$link) 
		die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());
	
	else{
		echo "<form method='post' action='barker_bobs2.php'>
			 <table align='center'>
			 <h1 align='center'>Bob's Entertainment Universe</h1><br>
			 <h2 align='center'>Welcome to Bob's Entertainment Universe.<br> Below are three departments
								containing media. Please choose one to continue.</h2>
			<tr>";
		$resultSet = mysqli_query($link, "SELECT DISTINCT department FROM products");
		while($row = mysqli_fetch_assoc($resultSet)){
			echo "<tr>
					<td width ='250' align='center'><input type='radio' name = 'departments' value ='{$row['department']}'>"; 
			foreach($row as $value){
				echo "$value&nbsp&nbsp</td>";
			}
			echo "</tr>";	
		}
	echo "<tr><td colspan='5' align='center'><input type='submit' value='Submit'>
		 <input type='reset' value = 'Clear'></td></tr>
		 </form>
		 <tr><td><br></td></tr>
		 <form method='post' action='barker_bobs2_2.php'>
			<tr><td cospan= '5'><b>Or Search By Entertainer/Author:&nbsp<b>
			<input type='text' name = 'search'>	
			<input type='submit' value='Search'>
			<span>(enter all or part of the name)</tr></td>
		</table>
	</form>";
	}
	mysqli_close($link);
?>
</body>
</html>