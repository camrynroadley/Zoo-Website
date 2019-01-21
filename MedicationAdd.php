<!DOCTYPE HTML>  
<html>
<head>
<title> Zoo Database</title>
<style>
­­
<meta name="viewport" content="width=device-width,initial-scale=1">

h2 {
    color: navy;
    margin-left: 20px;
}­­
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
$animalID= "";
$medicationIDDeleteErr = "";
$medicationIDDeleteID= "";
$newMedID = $newMedName = $newAnimalID = $newMedDes ="";
$newMedIDErr = $newMedNameErr = $newAnimalIDErr = $NewMedDesErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["animalID"])) {
    $animalIDErr = "Animal ID is required";
  } else {
    $animalID = test_input($_POST["animalID"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["medicationIDDelete"])) {
    $medicationIDDeleteErr = "Medication ID is required";
  } else {
    $medicationIDDelete = test_input($_POST["medicationIDDelete"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newMedID"])) {
   $newMedIDErr = "ID required"; 
  } else {
   $newMedID = test_input($_POST["newMedID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newMedID)) {
      $newMedIDErr = "Only Numbers allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newMedName"])) {
   $newMedNameErr = "Name is required"; 
  } else {
   $newMedName = test_input($_POST["newMedName"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$newMedName)) {
      $newMedNameErr = "Only letters and whitespace allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newMedDes"])) {
   $newMedDesErr = "Description is required"; 
  } else {
   $newMedDes = test_input($_POST["newMedDes"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$newMedDes)) {
      $newMedDesErr = "Only letters and whitespace allowed";
  }
 }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newAnimalID"])) {
   $newAnimalIDErr = "Animal ID is required"; 
  } else {
   $newAnimalID = test_input($_POST["newAnimalID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newAnimalID)) {
      $newAnimalIDErr = "Only Numbers allowed";
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
<!-- Links to other pages -->
</div>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page
    };
</script>


<h2>Add a medication:</h2>
* Required Field
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Medication ID: <input type="number" name="newMedID" value="<?php echo $newMedID;?>">
<span class="error">* <?php echo $newMedIDErr;?></span>
<br><br>
 Name of Medication: <input type="text" name="newMedName" value="<?php echo $newMedName;?>">
<span class="error">* <?php echo $newMedNameErr;?></span>
<br><br>
Description: <input type="text" name="newMedDes" value="<?php echo $newMedDes;?>">
<span class="error">* <?php echo $newMedDesErr;?></span>
<br><br>
Animal ID: <input type="number" name="newAnimalID" value="<?php echo $newAnimalID;?>">
<span class="error">* <?php echo $newAnimalIDErr;?></span>
<br><br>
<input type="submit" name="submit" value="Add">
</form>
<br><br>
<?php
// Replace 'username' and 'password'
$conn = oci_connect('usernmae', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');


$query2 = 'INSERT INTO Medication VALUES ('.$newMedID.',\''.$newMedName.'\',\''.$newMedDes.'\','.$newAnimalID.')';
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
