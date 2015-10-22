<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Bob's Cars</title>
</head>
<body>
      <?
      //FILENAME: barkerproject3.php
      //PROGRAMMER: Adam Barker
      //PURPOSE: Makes tables for Bob's car finances, pulled from the file
      //         provided. Also creates table for depreciating values on 2 of
      //         his fleet.

      //file used for table
      include 'bobscars.php';

      $make = strtok($data, "\n");
      
      //first table
      echo "<h1 align='center'> Bob's Rental Table </h1>";
      echo "<table align='center' width='700' cellpadding='5'
                   cellspacing='5' border='1'>";
      echo "<tr>
                <th>Vehicle Name</th>
                <th>Model Year</th>
                <th>Serial Number</th>
                <th>Rental Cost <br/>($ Per Day)</th>
                <th># Days Rented(2011)</th>
                <th>Gross Revenue</th>
                </tr>";
      //while loop cycles through data file to pull out individual strings
      while ($make) {
            $year = strtok("\n");
            $serialNum = strtok("\n");
            $seats = strtok("\n");
            $rent = number_format((float)strtok("\n"), 2);
            $rentDays = strtok("\n");
            $origPrice = strtok("\n");
            $deprec = strtok("\n");
            $maintenance = strtok("\n");
            $grossRevenue = number_format(($rent * $rentDays), 2);
            /*
            *$totalRevenue = sprintf("%.2f", ($rent * $rentDays));
            *did the above just to see if I could get it to work without
            *the number_format function. It does without comma seperators.
            */
            echo "<tr>
                      <td align='center'>$make</td>
                      <td align='center'>$year</td>
                      <td align='center'>$serialNum</td>
                      <td align='right'>$$rent</td>
                      <td align='right'>$rentDays</td>
                      <td align='right'>$$grossRevenue</td>
                      </tr>";
                  //put dollar signs in because Bob likes them...
            $make = strtok("\n");
      }
      echo "</table>";
      //end of table

      echo "<h1 align = 'center'>Depreciation Values</h1>";

      //Second Table
      echo "<table align='center' width='700' cellpadding='5'
                   cellspacing='5' border='1'>";
      echo "<tr><td align='center' colspan='4' style='font-weight:bold'>
                    Dodge Avenger - Depreciation over 5-year period (Factor:
                    .20)</td></tr>";
      echo "<tr>
                <th align='center'>YEAR</th>
                <th align='center'>Start Value</th>
                <th align='center'>Depreciation</th>
                <th align='center'>Ending Value</th>
                </tr>";

      /*
      *individual variables for 'for loops', can't put them in loop because
      *it will reset to initial values every loop. Didn't know where else to
      *put them. Up top doesn't make sense, they are very specific to this table
      *alone.
      */
      $year = 2006;
      $initialValue = 21297.0;
      $factor = .2;
      for ($i = 0; $i < 5; $i++){
          $deprecValue = $initialValue * $factor;
          $changedValue = $initialValue - $deprecValue;
          //number_format isn't playing nicely here.
          $deprecValueF = number_format($deprecValue, 2);
          $changedValueF = number_format($changedValue, 2);
          $initialValueF = number_format($initialValue, 2);
          echo "<tr>
                    <td align ='center'>$year</td>
                    <td align ='right'>$$initialValueF</td>
                    <td align ='right'>$$deprecValueF</td>
                    <td align ='right'>$$changedValueF</td>
                    </tr>";
          $initialValue = $changedValue;
          $year++;
      }

      //Second half of the table, decided to use for loop like a method.
      echo "<tr><td align='center' colspan='4' style='font-weight:bold'>
                    Cadillac Limo - Depreciation over 5-year period (Factor:
                    .10)</td></tr>";
      $year = 1999;
      $initialValue = 38900.0;
      $factor = .1;
      for ($i = 0; $i < 5; $i++){
          $deprecValue = $initialValue * $factor;
          $changedValue = $initialValue - $deprecValue;
          $deprecValueF = number_format($deprecValue, 2);
          $changedValueF = number_format($changedValue, 2);
          $initialValueF = number_format($initialValue, 2);
          echo "<tr>
                    <td align ='center'>$year</td>
                    <td align ='right'>$$initialValueF</td>
                    <td align ='right'>$$deprecValueF</td>
                    <td align ='right'>$$changedValueF</td>
                    </tr>";
          $initialValue = $changedValue;
          $year++;
      }
      echo "</table>";
      //end of table


      //ExtraCredit
      $loan = 179500.0;
      $interest = .05/12;
      $totalMonths = 15*12;
      $payments = ($loan * ($interest*(pow((1 + $interest), $totalMonths))))
                  / (pow((1 + $interest), $totalMonths) -1);
      $totalLoan = number_format(($payments * 180), 2);
      $payments = number_format($payments, 2);
      /*
      *made to test outcome
      *$payments = ($loan*$interest) / (1-(pow((1 + $interest), -$totalMonths)));
      */
      echo "<h1>Extra Credit</h1>";
      echo "Bob's loan of $179,500.00 with %5 interest over the next 15 years will
      result in monthly payments of $$payments and will come to a total of $$totalLoan.";
      ?>

</body>
</html>


