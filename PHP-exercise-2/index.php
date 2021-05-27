<?php

$salaryErr = $salarytypeErr = $taxfreeallowanceErr ="";
$salary = $salarytype = $taxfreeallowance = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["salary"])) {
    $salaryErr = "salary is required";
  } else {
    $salary = test_input($_POST["salary"]);
  }

if (empty($_POST["salarytype"])) {
    $salarytypeErr = "salary type is required";
  } else {
    $salarytype = test_input($_POST["salarytype"]);
  }

if (empty($_POST["taxfreeallowance"])) {
    $taxfreeallowanceErr = "tax free allowance is required";
  } else {
    $taxfreeallowance = test_input($_POST["taxfreeallowance"]);
  }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $yearlysalary = $yearlytotalsalary = $yearlytaxamount = $yearlysocialsecurityfee = $yearlytaxfreeallowance = 0;
  if(isset($salarytype) && $salarytype == "yearly") {
      $yearlysalary = $salary;
      $yearlytaxfreeallowance = $taxfreeallowance;    
   }elseif(isset($salarytype) && $salarytype == "monthly") {
      $yearlysalary = $salary * 12;
      $yearlytaxfreeallowance = $taxfreeallowance * 12;
  }
  if($yearlysalary < 10000) {
    $yearlytotalsalary = $yearlysalary + $yearlytaxfreeallowance;
   } elseif($yearlysalary > 10000 && $$yearlysalary < 25000) {
    $yearlytaxamount = $yearlysalary * 0.11;
    $yearlysocialsecurityfee = $yearlysalary * 0.04;
    $yearlytotalsalary = ($yearlysalary - ($yearlytaxamount + $yearlysocialsecurityfee)) + $yearlytaxfreeallowance;
   } elseif($yearlysalary > 25000 && $yearlysalary < 50000) {
    $yearlytaxamount = $yearlysalary * 0.30;
    $yearlysocialsecurityfee = $yearlysalary * 0.04;
    $yearlytotalsalary = ($yearlysalary - ($yearlytaxamount + $yearlysocialsecurityfee)) + $yearlytaxfreeallowance;
     } else {
    $yearlytaxamount = $yearlysalary * 0.45;
    $yearlysocialsecurityfee = $yearlysalary * 0.04;
    $yearlytotalsalary = ($yearlysalary - ($yearlytaxamount + $yearlysocialsecurityfee)) + $yearlytaxfreeallowance;
     }  
    $monthlytotalsalary = $montlysalary = $montlytaxamount = $monthlysocialsecurityfee = 0;

    $monthlysalary = $yearlysalary / 12;

    $monthlytaxamount = $yearlytaxamount / 12;

    $monthlysocialsecurityfee = $yearlysocialsecurityfee / 12;

    $monthlytotalsalary = $yearlytotalsalary / 12;
    

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="form">
            <h1>Income Tax Calculator</h1>
            <form method="POST" action="index.php">
                Salary in USD: <input type="number" name="salary" value="<?php echo $name;?>">
                      <span class="error"> <?php echo $salaryErr;?></span>
                         <br><br>
                                <input type="radio" name="salarytype" <?php if (isset($salarytype) && $salarytype=="female") echo "checked";?> value="monthly">Monthly
                                <input type="radio" name="salarytype" <?php if (isset($salarytype) && $salarytype=="male") echo "checked";?> value="yearly">Yearly
                                <span class="error">* <?php echo $salarytypeErr;?></span>
                         <br><br>
                Tax Free Allowance: <input type="number" name="taxfreeallowance" value="<?php echo $taxfreeallowance;?>">
                         <span class="error"> <?php echo $taxfreeallowanceErr;?></span>
                            <br><br>
                                <input type="submit" name="submit" value="Calculate">  

            </form>
        </div>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!$salaryErr && !$salarytypeErr && !$taxfreeallowanceErr) {
                echo "            
                    <table>
                            <tr>
                               <th></th>
                               <th>Monthly</th>
                               <th>Yearly</th> 
                            </tr>
                            <tr>
                               <td>Total Salary</td>
                               <td>$monthlysalary</td>
                               <td>$yearlysalary</td>
                            </tr>
                            <tr>
                               <td>Tax amount</td>
                               <td>$monthlytaxamount</td>
                               <td>$yearlytaxamount</td>
                            </tr>
                            <tr>
                               <td>Social Security Fee</td>
                               <td>$monthlysocialsecurityfee</td>
                               <td>$yearlysocialsecurityfee</td>
                             <tr>
                               <td>Salary after tax</td>
                               <td>$monthlytotalsalary</td>
                               <td>$yearlytotalsalary</td>
                             </tr>
                             </tr>
                    </table>";
            }
        }
        ?>
    </body>
</html>