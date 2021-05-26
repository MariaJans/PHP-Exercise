<DOCTYPE! HTML>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
<?php
$fullnameErr = $usernameErr = $passwordErr = $confirmpasswordErr = $emailErr = $phoneErr = $dateofbirthErr = $ssnumberErr= "";
$fullname = $username = $password = $confirmpassword = $email = $phone = $dateofbirth = $ssumber ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fullname"])) {
    $fullnameErr = "Name is required";
  } else {
    $fullname = show_data($_POST["fullname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        $fullnameErr = "Only letters and white space allowed";
      }
  }
  
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = show_data($_POST["username"]);
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = show_data($_POST["password"]);
  }

  if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "confirm password is required";
  } else {
    $confirmpassword = show_data($_POST["confirmpassword"]);
   if ($password != $confirmpassword) {
   echo("Error... Passwords do not match");
     }
  }

  if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {
    $email = show_data($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "phone number is required";
  } else {
    $phone = show_data($_POST["phone"]);
  }
  if (empty($_POST["dateofbirth"])) {
    $dateofbirthErr = "Date of birth is required";
  } else {
    $dateofbirth = show_data($_POST["dateofbirth"]);
  }
  if (empty($_POST["ssnumber"])) {
    $ssnumberErr = "Social Security number is required";
  } else {
    $ssumber = show_data($_POST["ssnumber"]);
  }
}

function show_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="wrapper">
<form class="form"  action="home.php" method="post">
<fieldset>
    <h2>Registration</h2>
 <span class="error"><?php echo $fullnameErr;?></span>
 <label for="fullname">Full Name</label><br>
  <input type="text" name= "fullname" value=<?php echo $fullname?>><br>

  <span class="error"><?php echo $usernameErr;?></span>
 <label for="username">Username</label><br>
  <input type="text" name="username" value=<?php echo $username?>><br>

  <span class="error"><?php echo $passwordErr;?></span>
 <label for="password">Password</label><br>
  <input type="password" name="password" value=<?php echo $password?>><br>

  <span class="error"><?php echo $confirmpasswordErr;?></span>
 <label for="confirmpass">Confirm Password</label><br>
  <input type="password" name="confirmpassword" value=<?php echo $confirmpassword?>><br>

  <span class="error"><?php echo $emailErr;?></span>
 <label for="email">Email</label><br>
  <input type="text" name="email" value=<?php echo $email?>><br>

  <span class="error"><?php echo $phoneErr;?></span>
 <label for="phone">Phone</label><br>
  <input type="tel" name="phone" value=<?php echo $phone?>><br>

  <span class="error"><?php echo $dateofbirthErr;?></span>
 <label for="dateofbirth">Date of Birth</label><br>
  <input type="date" name="dateofbirth" value=<?php echo $dateofbirth?>><br>

  <span class="error"><?php echo $ssnumberErr;?></span>
 <label for="ssnumber">Social Security Number</label><br>
  <input type="number" name="ssnumber" value=<?php echo $ssnumber?>><br>

 <input type="submit" name="submit"><br>
</fieldset>
</form>

<form class="form2"  action="safe.php" method="post" > 
    <fieldset>
        <h2>Login</h2>
     <label for="loginuser">Username</label><br>
      <input type="text" name= "loginuser"><br>
    
     <label for="loginpass">Password</label><br>
      <input type="password" name="loginpass"><br>
      <button type="submit">Login</button><br>
      
    </fieldset>
    <input type="hidden" name= "fullname" value=<?php echo $fullname?>>
    <input type="hidden" name="username" value=<?php echo $username?>>
    <input type="hidden" name="password" value=<?php echo $password?>>
    <input type="hidden" name="confirmpassword" value=<?php echo $confirmpassword?>>
    <input type="hidden" name="email" value=<?php echo $email?>>
    <input type="hidden" name="phone" value=<?php echo $phone?>>
    <input type="hidden" name="dateofbirth" value=<?php echo $dateofbirth?>>
    <input type="hidden" name="ssnumber" value=<?php echo $ssnumber?>>

</form>
</div>

</body>
</html>

