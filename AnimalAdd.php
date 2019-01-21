<!DOCTYPE HTML>  
<html>
<head>
<title> Zoo Database</title>
<style>

<meta name="viewport" content="width=device-width,initial-scale=1">

h2 {
    color: navy;
    margin-left: 20px;
}
p {
    font-size: 50px;
    border: 5px solid white;
    background-color: white;
    padding: 10px;
    margin: 20px;
    font-family: Georgia, serif;
    text-align: center;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #3e93ab;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

</style>
</head>
<body>
  
<?php
// define variables and set to empty values
$animalIDErr = "";
$animalID = "";
$animalIDDeleteErr = "";
$animalIDDelete = "";
$newName = $newDes = $newID = "";
$newNameErr = $IDErr = $DesErr = "";
$type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newName"])) {
   $newNameErr = "Animal name is required"; 
  } else {
   $newName = test_input($_POST["newName"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$newName)) {
      $newNameErr = "Only letters and white space allowed";
  }
 }

  if (empty($_POST["newDes"])) {
   $desErr = "Description is required"; 
  } else {
   $newDes = test_input($_POST["newDes"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$newDes)) {
      $DesErr = "Only letters and white space allowed";
  }
 }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newID"])) {
   $IDErr = "ID is required"; 
  } else {
   $newID = test_input($_POST["newID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newID)) {
      $IDErr = "Only Numbers allowed";
  }
 }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  if (empty($_POST["animalID"])) {
    $animalIDErr = "Animal ID is required";
  } else {
    $animalID = test_input($_POST["animalID"]);
  }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["animalIDDelete"])) {
    $animalIDDeleteErr = "Animal ID is required";
  } else {
    $animalIDDelete = test_input($_POST["animalIDDelete"]);
  }

}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="topnav" id="myTopnav">
<!-- Links to other pages would be here -->
</div>

<p> Animals</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // link to previous page would be here
    };
</script>


<h2>Add an animal: </h2>
* required field
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID: <input type="number" name="newID" value="<?php echo $newID;?>">
<span class="error">* <?php echo $IDErr;?></span>
<br><br>
Name: <input type="text" name="newName" value="<?php echo $newName;?>">
<span class="error">* <?php echo $newNameErr;?></span>
<br><br>
Description: <input type="text" name="newDes" value="<?php echo $newDes;?>">
<span class="error">* <?php echo $desErr;?></span>
<br><br>
<input type="submit" name="add" value="Submit">
<br>
<?php

// Replace 'username' and 'password' with Oracle credentials
$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//put your query here
$query2 = 'INSERT INTO Animal VALUES ('.$newID.',\''.$newName.'\',\''.$newDes.'\')';
$stid2 = oci_parse($conn,$query2);
$success2 = oci_execute($stid2,OCI_COMMIT_ON_SUCCESS);

oci_close($conn);

?>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>
