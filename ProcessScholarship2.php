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
    function displayRequired() {
        echo "The field \"$fieldName\" is required.<br>\n";
    }
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            displayRequired($fieldName);
            ++$errorCount;
            $retval = "";
        }
        else {
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return $retval;
    }
    //Uses stripslashes function to protect input/output
    $firstName = validateInput($_POST['fName'], "First Name");
    $lastName = validateInput($_POST['fName'], "Last Name");
    ?>
	</body>
</html>