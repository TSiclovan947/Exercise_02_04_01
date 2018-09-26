<!doctype html>

<html>
	<head>
	    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 25, 2018
        
        processScholarship.php
        -->
		<title>Process Scholarship</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
    <h2>Process Scholarship</h2>
    <?php
    //Uses stripslashes function to protect input/output
    $firstName = stripslashes($_POST['fName']);
    $lastName = stripslashes($_POST['lName']);
    //Prints to the screen the first name and last names that are inputted and submitted
    echo "Thank You for filling out the scholarship form, " . $firstName . " " . $lastName . ".";
    ?>
	</body>
</html>