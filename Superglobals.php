<!doctype html>

<html>
	<head>
	    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 25, 2018
        
        Superglobals.php
        -->
		<title>Superglabals</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		<script src="modernizr.custom.65897.js"></script>
	</head>

	<body>
    <h1>Superglobals</h1>
    <?php
    //The SERVER superglobal
    echo "<h3>superglobal Array \$_SERVER[]</h3>";
    //Used the server superglobal to get the script name
    echo "<p>The name of the current script is: " , $_SERVER["SCRIPT_NAME"], "<br>";
    //Used the server superglobal to get the software type
    echo "This script was executed with the following server software: ", $_SERVER["SERVER_SOFTWARE"], "<br>";
    //Used the server superglobal to get the protocol type
    echo "This script was requested with the following server protocol: ", $_SERVER["SERVER_PROTOCOL"], "<br>";
    //Used the server superglobal to retrieve the server name
    echo "This script is running on the following server name: ", $_SERVER["SERVER_NAME"], "<br>";
    //Used the server superglobal to retrieve the server address
    echo "This script is running on the following server address: ", $_SERVER["SERVER_ADDR"], "<br>";
    //Used the server superglobal to get the gateway interface
    echo "This script is running on the following gateway interface: ", $_SERVER["GATEWAY_INTERFACE"], "<br>";
    //Used the server superglobal to get the request method
    echo "This script is running on the following request method: ", $_SERVER["REQUEST_METHOD"], "<br>";
    ?>
	</body>
</html>