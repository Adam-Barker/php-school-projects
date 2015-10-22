<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment Universe</title>
</head>
<style>
div {
	  	display: block;
						}
</style>
<body>
	<?
//FILE : barker_bobs3.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs4 and formats them to appear as a receipt
	extract($_POST);
	echo "<h1 align='center'>Bob's Entertainment Universe</h1><br>";
	if(strlen($creditNum)  == 16 && $fullName != "" && $address != ""){
		$creditNum = substr($creditNum, -4);
		echo "<form method='post' action='barker_bobs1.php'>
			 		<div style='text-align: center'>
			 		==========================================================================================================================<br>
			 		$fullName<br>
			 		$address<br>
			 		$creditCard ending in $creditNum<br>
			 		<br>
			 		Your Card has been approved. You will recieve an E-mail shortly with your shipping details. Thank you for using Bob's Entertainment Universe!<br>
			 		This is a valid legal receipt, please save or print a copy for your records by pressing Ctrl + s to save or Ctrl + p to print. 
			 		==========================================================================================================================<br>
			 		<input type='submit' value='Back to Selections'>
			 		</div>
			</form>";
	}		
	else{
		echo "<h1 align='center' style='color:RED'>INFORMATION ENTERED IS INVALID!</h1>
                <p align='center'>Please press back and check your information!</p>";
	}



	?>

</body>
</html>