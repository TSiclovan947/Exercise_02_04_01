<!doctype html>

<html>
	<head>
	    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 27, 2018
        
        processJumbleMaker.php
        -->
		<title>Process Jumble Maker</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
    <h2>Process Jumble Maker</h2>
    <?php
    //Global variable to hold a count of errors
    $errorCount = 0;
    //Global variable to hold an array of words
    $words = array();
    //Function to handle all error display (takes defining parameters, 
    //the name of field and error message)
    function displayError($fieldName, $errorMsg) {
        global $errorCount;
        echo "Error for \"$fieldName\":$errorMsg<br>\n";
        ++$errorCount;
    }
    //Function to validate, cleanup, and return the data
    function validateWord($data, $fieldName) {
        global $errorCount;
        $retval = "";
        if (empty($data)) {
            //Every field has to be filled out
            displayError($fieldName, "This field is required");
            ++$errorCount;
            $retval = "";
        } 
        //Else to clean up any whitespace and get rid of escape characters
        else {
            $retval = trim($data);
            $retval = stripslashes($retval);
            if (strlen($retval) < 4 || strlen($retval) > 7) {
                //Makes sure words are between 4 and 7 letters in length
                displayError($fieldName, "Words must be between 4 and 7 characters in length");
            }
             //Using Regular Expressions to make sure only letters are used
            if (preg_match("/^[A-Za-z]+$/i", $retval) == 0) {
                displayError($fieldName, "Words must consist only letters");
            }
        }
        //Used the shuffle and strtoupper to shuffle and Uppercase the words
         $retval = strtoupper($retval);
         $retval = str_shuffle($retval);
         return $retval;
        //Returns the data
         return $data;
    }
        
    //Retrieve form data from POST Superglobal
    $words[] = validateWord($_POST['word1'], "Word 1");
    $words[] = validateWord($_POST['word2'], "Word 2");
    $words[] = validateWord($_POST['word3'], "Word 3");
    $words[] = validateWord($_POST['word4'], "Word 4");
    //This if else will produce the results needed for the program to work
    if ($errorCount > 0) {
        echo "Please use the \"Back\" button to re-enter any missing data.<br>\n";
    }
    else {
        $wordNum = 0;
        foreach ($words as $word) {
            echo "Word" . ++$wordNum . ": $word<br>\n";
        }
    }
    
    ?>
	</body>
</html>