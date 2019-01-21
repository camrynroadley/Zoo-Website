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
$foodIDDeleteErr = "";
$foodIDDelete = "";
$newFoodID = $newFoodName = $newAnimalID = "";
$newFoodIDErr = $$newFoodNameErr = $newAnimalIDErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["animalID"])) {
    $animalIDErr = "Animal ID is required";
  } else {
    $animalID = test_input($_POST["animalID"]);
  }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["foodIDDelete"])) {
    $foodIDDeleteErr = "Food ID is required";
  } else {
    $foodIDDelete = test_input($_POST["foodIDDelete"]);
  }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newFoodID"])) {
   $newFoodIDErr = "ID required"; 
  } else {
   $newFoodID = test_input($_POST["newFoodID"]);
   // check if name only contains letters and whitespace
   if (preg_match("/^[a-zA-Z ]*$/",$newFoodID)) {
      $newFoodIDErr = "Only Numbers allowed";
  }
 }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["newFoodName"])) {
   $newFoodNameErr = "Name is required"; 
  } else {
   $newFoodName = test_input($_POST["newFoodName"]);
   // check if name only contains letters and whitespace
   if (!preg_match("/^[a-zA-Z ]*$/",$newFoodName)) {
      $newFoodNameErr = "Only letters and whitespace allowed";
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
<!-- Links to other pages here -->
</div>

<p> Food</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page
    };
</script>


<h2>Add Food:</h2>
* required Field
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Food ID: <input type="number" name="newFoodID" value="<?php echo $newFoodID;?>">
<span class="error">* <?php echo $newFoodIDErr;?></span>
<br><br>
 Name of food: <input type="text" name="newFoodName" value="<?php echo $newFoodName;?>">
<span class="error">* <?php echo $newFoodNameErr;?></span>
<br><br>
Animal ID: <input type="number" name="newAnimalID" value="<?php echo $newAnimalID;?>">
<span class="error">* <?php echo $newAnimalIDErr;?></span>
<br><br>
<input type="submit" name="submit" value="Add">
</form>
<br><br>
<?php
// Replace 'username' and 'password'
$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query2 = 'INSERT INTO Food VALUES ('.$newFoodID.',\''.$newFoodName.'\','.$newAnimalID.')';
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
