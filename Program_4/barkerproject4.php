<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Bob's Cars</title>
</head>
<body>
      <?
      //FILENAME: barkerproject3.php
      //PROGRAMMER: Adam Barker
      //PURPOSE: Creates an array out of Bob's data file and uses said array to
      //         populate a table.


include 'bobsinventory.php';
$delim = " \n";

#Loading array here
$vehicle['model']                          = strtok($data, " ");
$vehicle['year']                           = strtok($delim);
$vehicle['serial']                         = strtok($delim);
$vehicle['numSeats']                       = strtok($delim);
$vehicle['rentCost']                       = strtok($delim);
$vehicle['daysRented']                     = strtok($delim);
$vehicle['totalRev']                       = strtok($delim);
$vehicle['origPrice']                      = strtok($delim);
$vehicle['mileage']                        = strtok($delim);
$vehicle['depFact']                        = strtok($delim);
$vehicle['schedMaint']                     = strtok($delim);

#Start of table
echo "<h1 align='center'> Bob's Rental Table </h1>";
echo "<table align='center' width='700' cellpadding='5'
                   cellspacing='5' border='1'>";

echo "<tr>";

#Sets header values
echo "<th>Model</th><th>Year</th><th>Serial</th><th>Rental Costs</th>
<th>Number of Days Rented</th><th>Total Revenue</th><th>Original Price</th>
<th>Mileage</th><th>Notes</th>";
echo "</tr>";

#Accumulators
$totDays = 0;
$totRev  = 0;

while ($vehicle['model']) {

    #Iterates through array for data values and inputs them into a table
    foreach ($vehicle as $key => $value) {
        if ($key != 'numSeats' && $key != 'depFact' && $key != 'schedMaint')
            echo "<td>$value</td>";
    }
    if ($vehicle['mileage'] > 100000 && $vehicle['daysRented'] < 10)
        echo "<td>I & L</td>";
    else if ($vehicle['daysRented'] < 10)
        echo "<td>L</td>";
    else if ($vehicle['mileage'] > 100000)
        echo "<td>I</td>";
    else
        echo "<td></td>";
    echo "</tr>";

    #Accumulators
    $totDays += $vehicle['daysRented'];
    $totRev += $vehicle['totalRev'];

    #Repopulates table with next string of values
    $vehicle['model']                          = strtok($delim);
    $vehicle['year']                           = strtok($delim);
    $vehicle['serial']                         = strtok($delim);
    $vehicle['numSeats']                       = strtok($delim);
    $vehicle['rentCost']                       = strtok($delim);
    $vehicle['daysRented']                     = strtok($delim);
    $vehicle['totalRev']                       = strtok($delim);
    $vehicle['origPrice']                      = strtok($delim);
    $vehicle['mileage']                        = strtok($delim);
    $vehicle['depFact']                        = strtok($delim);
    $vehicle['schedMaint']                     = strtok($delim);




}
#Output for accumulators
$totRev = number_format($totRev, 2);
echo "<tr><td><b>Total Revenue:</b></td><td>$totRev</td><td><b>
Total Number of Days Rented:</b></td><td>$totDays</td></tr>";

#End table
echo "</table>";
?>

</body>
</html>
