<?php

function palindromeCheck($string)
{

    $stringrev = strrev($string);

    if (strcasecmp($string, $stringrev) == 0) {
        echo "Your string is a palindrome";
    } else {
        echo "false, your string is not a palindrome";
    }
}

function requiredFields()
{
    if ($_POST["string"] != null) {

        return true;
    } else {
        return false;
    }
}

        if (requiredFields()) {
            if (isset($_POST["string"])) {
                palindromeCheck($_POST["string"]);
            }
        } else {
            echo "<h3>Enter a string value<h3>";
        }

?>

<!DOCTYPE html>
<head>
</head>
<body>

    <div>
        <h2>Palindrome Checker </h2>
        <form  method="POST" action="palindrome.php">
          Enter a String:<input id="palindrome" type="text" name="string" value=<?php echo "$_POST[string]"; ?>>

            <button type="submit">ChECK</button>
        </form>
       
    </div>
</body>

</html>

