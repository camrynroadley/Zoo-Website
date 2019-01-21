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
$enclosureID = "";
$enclosureIDErr = "";
$enclosureIDDeleteErr = "";
$enclosureIDDelete = "";
$enclosureDescription = "";
$animalID = "";
$staffID = "";
$newEnclosureID = $enclosureName = $enclosureDes = $newAnimalID = $newStaffID = "";
$newEnclosureIDErr = $enclosureNameErr = $enclosureDesErr = $newAnimalIDErr = $newStaffIDErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["enclosureID"])) {
    $enclosureIDErr = "Enclosure ID is required";
  } else {
    $enclosureID = test_input($_POST["enclosureID"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["enclosureIDDelete"])) {
    $enclosureIDDeleteErr = "Enclosure ID is required";
  } else {
    $enclosureIDDelete = test_input($_POST["enclosureIDDelete"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newEnclosureID"])) {
   $newEnclosureIDErr = "ID required"; 
  } else {
   $newEnclosureID = test_input($_POST["newEnclosureID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newEnclosureID)) {
      $newEnclosureIDErr = "Only Numbers allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["enclosureDes"])) {
   $enclosureDesErr = "Description is required"; 
  } else {
   $enclosureDes = test_input($_POST["enclosureDes"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$enclosureDes)) {
      $enclosureDesErr = "Only Letters and White Space allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["enclosureName"])) {
   $enclosureNameErr = "Enclosure name is required"; 
  } else {
   $enclosureName = test_input($_POST["enclosureName"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$enclosureName)) {
      $enclosureNameErr = "Only Letters and White Space allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newStaffID"])) {
   $newStaffIDErr = "ID is required"; 
  } else {
   $newStaffID = test_input($_POST["newStaffID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newStaffID)) {
      $newStaffIDErr = "Only Numbers allowed";
  }
 }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newAnimalID"])) {
   $newAnimalIDErr = "Position is required"; 
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
<!-- Links to other pages here -->
</div>

<p> Enclosures</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page
    };
</script>


<h2>Add an enclosure:</h2>
* required Field
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
ID: <input type="number" name="newEnclosureID" value="<?php echo $newEnclosureID;?>">
<span class="error">* <?php echo $newEnclosureIDErr;?></span>
<br><br>
Enclosure Name: <input type="text" name="enclosureName" value="<?php echo $enclosureName;?>">
<span class="error">* <?php echo $enclosureNameErr;?></span>
<br><br>
Enclosure Description: <input type="text" name="enclosureDes" value="<?php echo $enclosureDes;?>">
<span class="error">* <?php echo $enclosureDesErr;?></span>
<br><br>
Animal ID: <input type="number" name="newAnimalID" value="<?php echo $newAnimalID;?>">
<span class="error">* <?php echo $newAnimalIDErr;?></span>
<br><br>
Staff ID: <input type="number" name="newStaffID" value="<?php echo $newStaffID;?>">
<span class="error">* <?php echo $newStaffIDErr;?></span>
<br><br>
<input type="submit" name="submit" value="Add">
</form>
<br><br>
<?php
// Replace 'username' and 'password'
$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query2 = 'INSERT INTO Enclosure VALUES ('.$newEnclosureID.',\''.$enclosureName.'\',\''.$enclosureDes.'\',\''.$newAnimalID.'\','.$newStaffID.')';
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
