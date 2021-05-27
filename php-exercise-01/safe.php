
<?php 

$fullname = $username = $password = $confirmpassword = $email = $phone = $dateofbirth = $ssnumber = $loggedusername = $loggedpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $loggedusername=htmlspecialchars($_POST["loggedusername"]);
   $loggedpassword=htmlspecialchars($_POST["loggedpassword"]);
   $fullname=htmlspecialchars($_POST["fullname"]);
   $username=htmlspecialchars($_POST["username"]);
   $password=htmlspecialchars($_POST["password"]);
   $confirmpassword=htmlspecialchars($_POST["confirmpassword"]);
   $email=htmlspecialchars($_POST["email"]);
   $phone=htmlspecialchars($_POST["phone"]);
   $dateofbirth=htmlspecialchars($_POST["dateofbirth"]);
   $ssnumber=htmlspecialchars($_POST["ssnumber"]);


}
?>

<!DOCTYPE html>

<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Personal Information</h1>
   

    <table>
    <tr>
    <th>Name:</th>
    <?php echo "<td>$fullname</td>";?>

    <tr>
    <th>Username:</th>
    <?php echo "<td>$username</td>";?>

    <tr>
    <th>Password:</th>
    <?php echo "<td>$password</td>";?>
    
    <tr>
    <th>Email:</th>
    <?php echo "<td>$email</td>";?>
    </div>
    <br>

    <tr>
    <th>Phone:</th>
    <?php echo "<td>$phone</td>";?>
 
    <tr>
    <th>Date of birth:</th>
    <?php echo "<td>$dateofbirth</td>";?>
 
    <tr>
    <th>Social Security Number</th>
    <?php echo "<td>$ssnumber</td>";?>
    
    </table>
</body>
</html>
