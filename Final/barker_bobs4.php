<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment Universe</title>
</head>
<body>
<?
//FILE : barker_bobs3.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs3 and employs an additional form
$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

if(!$link) 
	die("Connection problem...Error ".mysqli_connect_errno(). mysqli_connect_error());

	
else{

	extract($_POST);
	session_start();
	$total = 0;
	$department = $_SESSION['mediaType'];
	
	echo "<table align='center'>
			<h1 align='center'>Bob's Entertainment Universe</h1><br>
			<h1 align='center'>$department</h1>
			<td><h3>ID</h3></td>
			<td><h3>Entertainer/Author</h3></td>
			<td><h3>Title</h3></td>
			<td><h3>Unit Price</h3></td>
			<td><h3># of Units</h3></td>
			<td><h3>Summary</h3></td>";
		if(isset($choice)){
			foreach($choice as $value){
				$resultSet = mysqli_query($link, "SELECT products.ID, entertainerauthor, title, unitPrice, unitsInStock, summary
					FROM products, prodinv WHERE products.ID = prodinv.ID AND products.ID = '$value' ORDER BY entertainerauthor");
            	while ($row = mysqli_fetch_assoc($resultSet)) {
                	echo "<tr>";
                	$total += $row['unitPrice'];
                		foreach ($row as $value) {
                    		echo "<td width ='250'>$value&nbsp&nbsp</td>";
                		}
                	echo "</tr>";
            	}
			}
			echo "<tr><td colspan='10' align='center'><h3>Thank you for your choices! Your total amount due is $$total!</h3></td></tr>
				<tr></tr>
				<tr><td colspan='10' align='center'><h2>Please enter your information to check out!</h2></td></tr>
				<form method='post' action='barker_bobs5.php'>
					<tr><td colspan='10' align='center'>
						<table> 
							<tr>
								<td></td>
								<td style='color: red'>*Required</td>
							<tr>
								<td width='110'><b>Full Name:</b></td>
								<td><input type='text' name='fullName'>
								<span style='color: red'>*</span></td>
							</tr>
							<tr>
								<td><b>Address:</b></td>
								<td><input type='text' name='address'>
								<span style='color: red'>*</span></td>							
							</tr>
 							<tr>
 								<td><b>Credit Card:</b></td>
 								<td><select name='creditCard' style='width: 175px'>
                     				<option selected value='Visa'>Visa</option>
                     				<option value='MasterCard'>Master Card</option>
                     				<option value='AmericanExpress'>American Express</option>
                     				<option value='Discover'>Discover</option>
                     				</select>
								<span style='color: red'>*</span></td>
                     		</tr>					
                   			<tr>
                   				<td><b>Credit Card #:</b></td>
                   				<td><input type='text' name='creditNum'>
								<span style='color: red'>*</span></td>
                   			</tr>
                   			<tr>
								<td colspan='5' align='center'><input type='submit'>
								<input type='reset' value='Clear'></td>
							</tr>
						</table>
					</td></tr>
				</form>";		
		}
		else{
		echo "<h1 align='center' style='color:RED'> You didn't make any choices!</h1>
			<p align='center'>Please press back and make a choice!</p>";
		}
	echo "</table>";
}
mysqli_close($link);
?>
</body>
</html>