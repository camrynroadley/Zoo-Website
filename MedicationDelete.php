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
$animalID= "";
$medicationIDDeleteErr = "";
$medicationIDDeleteID= "";

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

<p> Medication</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page
    };
</script>

<h2>Delete a medication:</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Medication ID to delete: <input type="number" name="medicationIDDelete">
  <span class="error"> <?php echo $medicationIDDeleteErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Delete Medication"> 
</form>

<?php
// Replace 'username' and 'password'
$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query1 = 'DELETE FROM Medication WHERE Medication_ID=\''.$medicationIDDelete."'";
$stid1 = oci_parse($conn,$query1);
$success = oci_execute($stid1,OCI_COMMIT_ON_SUCCESS);

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
