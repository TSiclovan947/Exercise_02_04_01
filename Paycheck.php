<!doctype html>

<html>

<head>
    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: October 1, 2018
        
       Paycheck.php
        -->
    <title>Paycheck</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body style="text-align:center">
    <h2>Paycheck</h2>
    <?php
    //Global Variables
    $errorCount = 0;
    $workHours = $_GET["hours"];
    $wages = $_GET["pay"];
    $number = "";
    
    //Echo the hours worked
    echo "Number of Hours Worked: $workHours hours.<br>";
    //Echo the amount employee makes per hour
    echo "Employee's Hourly Wage: $$wages dollars an hour.<br>";
    //If the employee workd less than or equal to 40 hours calculates the wage and hours worked
    if ($workHours <= 40) {
        $payCheck = ($workHours * $wages);
        echo "Your Paycheck is: $payCheck.<br>\n";
    }
    //Else any hours over 40 will be calculated as time and a half
    else {
        $payCheck = (($workHours * $wages) + (($workHours - 40) * ($wages * 1.5)));
        echo "Total Paycheck is: $$payCheck dollars.<br>\n";
    }
    //Function to validate the wages
    //Alert user if any field is left blank
    function validateWages($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "<strong>\"$fieldName\" is a required field.</strong><br>\n";
            ++$errorCount;
        }
    }
    //Makes sure fields ae filled out
    if (isset($_GET['Submit'])) {
        $workHours = validateWages($_GET['hours'], "<strong>Number of Hours Worked</strong>");
        $wages = validateWages($_GET['pay'], "<strong>Employee's Hourly Wage</strong>");
    }
    ?>
</body>

</html>
