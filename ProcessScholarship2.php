<!doctype html>

<html>
	<head>
	    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 25, 2018
        
        processScholarship2.php
        -->
		<title>Process Scholarship 2</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
    <h2>Process Scholarship 2</h2>
    <?php
    //Variable to keep track of errors
    $errorCount = 0;
    //Function to Validate for entire field
    function displayRequired($fieldName) {
        echo "The field \"$fieldName\" is required.<br>\n";
    }
    //Function to validiate the input submitted
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            displayRequired($fieldName);
            ++$errorCount;
            $retval = "";
        }
        else {
            $retval = trim($data);
            //Stripslashes function to protect
            $retval = stripslashes($retval);
        }
        return $retval;
    }
    
    //Cut off the PHP script and inserted HTML
    //Function to didisplay the output
    function redisplayForm($firstName, $lastName) {
    ?>
    <h2 style="text-align: center">Scholarship Form</h2>
    <form name="scholarship" action="ProcessScholarship2.php" method="post">
    <!-- Added in the value to save the data that is entered in the input field -->
	   <p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>"></p>
	   <p>Last Name: <input type="text" name="lName" value="<?php echo $lastName; ?>"></p>
	   <p>
	       <input type="reset" value="Clear Form">&nbsp;&nbsp;
	       <input type="submit" value="Send Form">
	   </p>
	   </form>
    <?php
    }
        
    //Uses validateInput function to display input/output
    $firstName = validateInput($_POST['fName'], "First Name");
    $lastName = validateInput($_POST['lName'], "Last Name");
    //If there are errors, errors are numbered
    if ($errorCount > 0) {
        echo "$errorCount errors: Please re-enter the information below.<br>\n";
        //Redisplays the scholarship form again
        redisplayForm($firstName, $lastName);
    }
    else {
    //Displays the text if both fields are filled out
    echo "Thank You for filling out the scholarship form, " . $firstName . " " . $lastName . ".";
    }
    
    ?>
	</body>
</html>