<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $groupErr= $agreeErr= "";
$name = $email = $gender = $classdetails = $group=$selectcourses= $agree = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["group"])) {
    $group = "";
  } else {
    $group = test_input($_POST["group"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$group)) {
      $groupErr = "Invalid URL";
    }
  }

  if (empty($_POST["classdetails"])) {
    $classdetails = "";
  } else {
    $classdetails= test_input($_POST["classdetails"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
if (empty($_POST["selectcourses"])) {
  $selectcourses= "";
} else {
  $selectcourses= test_input($_POST["selectcourses"]);
}if (empty($_POST["agree"])) {
  $agreeErr = "You must agree to terms";
} else {
  $agree = test_input($_POST["agree"]);
 
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 Group: <input type="text" name="group" value="<?php echo $group;?>">
  <span class="error"><?php echo $groupErr;?></span>
  <br><br>
 Class details: <textarea name="classdetails" rows="5" cols="40"><?php echo $classdetails;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male

  <span class="error">* <?php echo $genderErr;?></span>
  <br>
 
  
  Select Courses:  <select name="selectcourses"multiple>
  <option value="PHP">PHP</option>
    <option value="Java Script">Java Script</option>
    <option value="MYSQL">MYSQL</option>
    <option value="HTML">HtML4</option>
  
 </select>
 <br>
 Agree:<input type="checkbox" name="Agree" value="<?php echo $agree;?>" />
 <span class="error">* <?php echo $agreeErr;?></span>
 <br>
<input type="submit" name="submit" value="Submit">
  <br>
</form>

<?php
echo "<h2>Your given values are as:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $group;
echo "<br>";
echo $classdetails;
echo "<br>";
echo $gender;
echo "<br>";
echo $selectcourses;
echo "<br>";
echo $agree;
echo "<br>";
?>

</body>
</html>