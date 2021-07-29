<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A DATABASE THING</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="img/undraw_No_data_re_kwbl.png">
</head>
<body>

<?php

$fnameErr = $lnameErr = $genderErr = $ageErr = $gradeErr = $classError = $scholarshipErr = $aidErr = $gpaErr = $emailErr = "";
$fname = $lname = $gender = $age = $numClasses = $scholarship  = $grade = $aid = $gpa = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "This field is required";
  } else {
    $fname = $_POST["fname"];
    if (!preg_match("/^[a-zA-Z-]*$/",$fname)) {
        $fnameErr = "Only letters allowed";
    }
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "This field is required";
  } else {
    $lname = $_POST["lname"];
    if (!preg_match("/^[a-zA-Z-]*$/",$lname)) {
        $lnameErr = "Only letters allowed";
    }
  }

  if (empty($_POST["age"])) {
    $ageErr = "This field is required";
  } else {
    $age = $_POST["age"];
    if (!preg_match("/^[0-9]*$/",$age)) {
        $ageErr = "Please specify a valid number";
    }
  }

   if (empty($_POST["gender"])) {
    $genderErr = "This field is required";
  } else {
    $gender = $_POST["gender"];
  }

  if (empty($_POST["numClasses"])) {
    $classError = "This field is required";
  } else {
    $numClasses = $_POST["numClasses"];
    if (!preg_match("/^[0-9]*$/",$numClasses)) {
        $classError = "Please specify a valid number";
    } else {
        echo"<script src='classes.js'></script>";
    }
  }

  if (empty($_POST["scholarship"])) {
    $scholarshipErr = "This field is required";
  } else {
    $scholarship = $_POST["scholarship"];

    if (!preg_match("/^['Y' 'N']*$/",$scholarship)) {
        $scholarshipErr = "Please state 'Y' or 'N'";
    }
    else {
        if (str_contains($scholarship, 'Y')) {
            echo"<script src='scholarship.js'></script>";
        }
        else {
            $scholarship = $_POST["scholarship"];
        }
        $scholarship = $_POST["scholarship"];
    }
  }

  if (empty($_POST["grade"])) {
    $gradeErr = "This field is required";
  } else {
    $grade = $_POST["grade"];
  }
  if (empty($_POST["aid"])) {
    $aidErr = "This field is required";
  } else {
    $aid = $_POST["aid"];
  }

  if (empty($_POST["gpa"])) {
    $gpaErr = "This field is required";
  } else {
    $gpa = $_POST["gpa"];
    if (!preg_match("/^[0-9 '.']*$/",$gpa)) {
        $gpaErr = "Please specify a valid number";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "This fie is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid Email";
    }
  }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="fname">First Name:</label><br>
  <input type="text" id="fname" name="fname" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $fnameErr;?></span>
  <br><br>
  <label for="lname">Last Name:</label><br>
  <input type="text" id="lname" name="lname" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $lnameErr;?></span>
  <br><br>
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $ageErr;?></span>
  <br><br>
  <label for="male">Gender: </label>
  <input type="radio" id="male" name="gender" value="Male">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">Female</label>
  <input type="radio" id="other" name="gender" value="Other">
  <label for="other">Other</label>
  <span class="error" style="color:#e60000; margin-left: 8px;">* <?php echo $genderErr;?></span>
  <br><br>
  <label for="numClasses">Amount of Classes:</label><br>
  <input type="text" id="numClasses" name="numClasses" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $classError;?></span>
  <br><br>
  <label for="scholarship">Is the student on a scholarship? Reply with Y or N:</label><br>
  <input type="text" id="scholarship" name="scholarship" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $scholarshipErr;?></span>
  <br><br>
  <label for="grade">Grade Level:</label><br>
  <input type="text" id="grade" name="grade" value="">
  <span class="error" style="color:e60000; margin-left: 7px;">* <?php echo $gradeErr;?></span>
  <br><br>
  <label for="aid">Financial Aid Status:</label><br>
  <input type="text" id="aid" name="aid" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $aidErr;?></span>
  <br><br>
  <label for="gpa">GPA:</label><br>
  <input type="text" id="gpa" name="gpa" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $gpaErr;?></span>
  <br><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value="">
  <span class="error" style="color:#e60000; margin-left: 7px;">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit">
</form>
</body>
</html>