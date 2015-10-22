<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Entertainment Universe</title>
</head>
<body>
<?
//FILE : barker_bobs2.php
//PROG : Adam Barker
//PURP : Displays proccessed checkbox values of barker_bobs2 or barker_bobs2_2.html
extract($_POST);
session_start();

$link = mysqli_connect("localhost", "root", "Finucky1", "cpt283db");

if (!$link)
    die("Connection problem...Error " . mysqli_connect_errno() . mysqli_connect_error());

else {
    echo "<form method='post' action='barker_bobs4.php'>
            <table align='center'>";
    
    $departments = $_SESSION['mediaType'];
    echo "<h1 align = 'center'>Bob's Entertainment Universe</h1><br>
          <h1 align='center'>$departments</h1><br>";
    if (isset($choice)) {
    	echo "<h2 align='center'>Here are the titles you were interested in. Please make a selection from the following to confirm your choices!</h2><br>
        <tr>
            <td></td>
            <td><h2>ID</h2></td>
            <td><h2>Entertainer/Author</h2></td>
            <td><h2>Title</h2></td>
            <td><h2>Unit Price</h2></td>
            <td><h2># of Units</h2></td>
            <td><h2>Summary</h2></td>";
        foreach ($choice as $value) {            
            $resultSet = mysqli_query($link, "SELECT products.ID, entertainerauthor, title, unitPrice, unitsInStock, summary
					FROM products, prodinv WHERE products.ID = prodinv.ID AND products.ID = '$value' ORDER BY entertainerauthor");
            while ($row = mysqli_fetch_assoc($resultSet)) {
                echo "<tr>
                        <td align><input type='checkbox' name = 'choice[]' value ='{$row['ID']}'</td>";
                foreach ($row as $value) {
                    echo "<td width ='250'>$value&nbsp&nbsp</td>";
                }
                echo "</tr>";
            }
        }
    
     	  echo "<tr>
                    <td></td>
                    <td><input type='submit' value='Submit'>
                    <input type='reset' value = 'Clear'></td></tr>
            </table>
    	</form>"; 
    }
    else{
		echo "<h1 align='center' style='color:RED'> You didn't make any choices!</h1>
                <p align='center'>Please press back and make a choice!</p>";
	}
}
mysqli_close($link);
?>
</body>
</html>