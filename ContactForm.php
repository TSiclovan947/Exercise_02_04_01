<!doctype html>

<html>

<head>
    <!--   
         Exercise 02_03_01
         Author: Tabitha Siclovan
         Date: September 28, 2018
        
        ContactForm.php
        -->
    <title>Contact Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
    //List of global variables
    $showForm = true;
    $errorCount = 0;
    $sender = "";
    $email = "";
    $subject = "";
    $message = "";
    function validateEmail($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br>\n";
            ++$errorCount;
            $retval = "";
        }
        else {
            $retval = trim($data);
            $retval = stripslashes($retval);
            $pattern = "/^[\w-]+(\.[\w-]+)*@" . "[\w-]+(\.[\w-]+)*" . "(\.[a-z]{2,})$/i";
            if (preg_match($pattern, $retval) == 0) {
                echo "\"$fieldName\" is not a valid e-mail address.<br>\n";
                ++$errorCount;
            }
        }
        return $retval;
    }
    function validateInput($data, $fieldName) {
        global $errorCount;
        if (empty($data)) {
            echo "\"$fieldName\" is a required field.<br>\n";
            ++$errorCount;
            $retval = "";
        }
        else {
            $retval = trim($data);
            $retval = stripslashes($retval);
        }
        return $retval;
    }
    //Function to take care of displaying the form
    //Sticky form
    function displayForm($sender, $email, $subject, $message) {
    ?>
    <h2 style="text-align: center">Contact Me</h2>
    <form name="contact" action="ContactForm.php" method="post">
        <p>Your Name:<br> <input type="text" name="Sender" value="<?php echo $sender; ?>"></p>
        <p>Your E-mail:<br> <input type="text" name="Email" value="<?php echo $email; ?>"></p>
        <p>Subject:<br> <input type="text" name="Subject" value="<?php echo $subject; ?>"></p>
        <p>Message:<br> <textarea name="Message"><?php echo $message?></textarea></p>
        <p>
            <input type="reset" value="Clear Form">&nbsp;&nbsp;
            <input type="submit" name="Submit" value="Send Form">
        </p>
    </form>
    <?php
    }
    if (isset($_POST['Submit'])) {
        $sender = validateInput($_POST['Sender'], "Your Name");
        $email = validateEmail($_POST['Email'], "Your E-mail");
        $subject = validateInput($_POST['Subject'], "Subject");
        $message = validateInput($_POST['Message'], "Message");
        if ($errorCount == 0) {
            $showForm = false;
        }
        else {
            $showForm = true;
        }
    }
    if ($showForm) {
        if ($errorCount > 0) {
            echo "<p>Please re-enter the form information below.</p>\n";
        }
        displayForm($sender, $email, $subject, $message);
    }
    else {
        $senderAddress = "$sender <$email>";
        $headers = "From:
        $senderAddress\nCC:$senderAddress";
        $result = mail("tsiclovan13@gmail.com", $subject, $message, $headers);
        if ($result) {
            echo "<p>Your message has been sent. Thank you, " . $sender . " .</p>\n";
        }
    }
    ?>
</body>

</html>
