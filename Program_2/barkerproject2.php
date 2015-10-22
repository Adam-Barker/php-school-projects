<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Barkers Bookstore</title>
</head>
<body>
      <h1>Barkers Bookstore Operating Cost</h1>
      <pre>
      <?
       //FILENAME: barkerproject2.php
       //PROGRAMMER: Adam Barker
       //PURPOSE: Shows dollar values for aspects of a simulated bookstore.

        define("NET_INC_FACTOR", .57);
        $sales = 190000;
        $rent = 25000;
        $salaries = 37500;
        $supplies = 410;
        $total_costs = $rent + $salaries + $supplies;
        $operating_income = $sales - $total_costs;
        $net_income = $operating_income * NET_INC_FACTOR;

        print <<<SALES_DOC
<br>======================================
Sales: $$sales

Expenses:
   Rent: $$rent
   Salary: $$salaries
   Supplies: $$supplies
   
Total costs: $$total_costs
Operating Income: $$operating_income
Income After Taxes (net): $$net_income
======================================
SALES_DOC;

       print ("<br><b>Extra Credit</b><br>");
       printf ("======================================
Sales: $%.2f
Expenses:
   Rent: $%.2f
   Salary: $%.2f
   Supplies: $%.2f
       <br>
Total Costs: $%.2f
Operating Income: $%.2f
Income After Taxes (net): $%.2f
======================================"
       , $sales, $rent, $salaries, $supplies, $total_costs, $operating_income,
       $net_income);
       ?>
</body>
</html>
