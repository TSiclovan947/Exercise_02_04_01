<!doctype html>

<html>
	<head>
	    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 26, 2018
        
        NumberForm.php
        -->
		<title>Number Form</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
    <h1>Number Form</h1>
    <?php
    //Variable set to true
    $displayForm = true;
    //Empty Number variable
    $number = "";
    //Determining if here based on form submit or not
    if (isset($_POST['submit'])) {
        //If superglobal sent with submit field, has data
        $number = $_POST['number'];
        //If data valid = success
        if (is_numeric($number)) {
            $displayForm = false;
        }
        else {
            //If not valid data = failure
            echo "<p>You need to enter a numeric value.</p>\n";
            $displayForm = true;
        }
    }
        
    if ($displayForm) {
    ?>
    <!--HTML Form built into the PHP File-->
    <!--Input field for entering a number-->
    <form name="numberForm" action="NumberForm.php" method="post">
        <p>
            Enter a number: <input type="text" name="number" value="<?php echo $number; ?>">
        </p>
        <p>
            <input type="reset" value="Clear Form">&nbsp;&nbsp;
            <input type="submit" name="submit" value="Send Form">
        </p>
    </form>
    <?php
    }
    else {
        //Echos the following when a numeric value is inserted
        echo "<p>Thank you for entering a number.</p>\n";
        echo "<p>Your number, $number, squared is " . ($number * $number) . ".</p>\n";
        echo "<p><a href=\"NumberForm.php\">Try Again?</a></p>\n";
    }
    ?>
	</body>
</html>