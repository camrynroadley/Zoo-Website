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
<!--Links to other pages would be here-->
</div>

<p> Animals</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page would be here
    };
</script>


<h2>Search for animal:</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Animal ID: <input type="number" name="animalID">
  <span class="error"> <?php echo $animalIDErr;?></span>
  <br><br>
  <input type="submit" name="search" value="Search ID"> 
</form>

<?php
// Replace 'username' and 'password'
$conn = oci_connect('username', 'password', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//put your query here
$query = 'SELECT * FROM Animal WHERE Animal_ID=\''.$animalID."'";
$stid = oci_parse($conn,$query);
oci_execute($stid,OCI_DEFAULT);

echo '<br/>';
echo "<table border='0'>
<tr>
<th>Animal ID</th>
<th>Animal Name</th>
<th>Animal Description</th>
</tr>";

while($row = oci_fetch_array($stid,OCI_ASSOC))
{
    echo "<tr>";
    foreach ($row as $item) {
        echo '<td>' . $item . '</td>'; //get items using property value
    }
    echo '</tr>';}
echo "</table>";

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
