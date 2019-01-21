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

.button {
  border-radius: 4px;
  background-color: #3e93ab;
  border: none;
  color: white;
  text-align: center;
  font-size: 15px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}


</style>
</head>
<body>
  

<?php
// define variables and set to empty values
$employeeIDErr = "";
$employeeID = "";
$employeeIDDeleteErr = "";
$employeeIDDelete = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["employeeID"])) {
    $employeeIDErr = "Employee ID is required";
  } else {
    $employeeID = test_input($_POST["employeeID"]);
  }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["employeeIDDelete"])) {
    $employeeIDDeleteErr = "Employee ID is required";
  } else {
    $employeeIDDelete = test_input($_POST["employeeIDDelete"]);
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

<p> Employees</p>

<button id="backButton" class="float-left submit-button" >Back</button>
<script type="text/javascript">
    document.getElementById("backButton").onclick = function () {
        // Link to previous page here
    };
</script>

<br><br>
<br><br>
<h2>What would you like to do:</h2>

<button id="searchEmployeeButton" class="button"><span>Search for Employee </span></button>
<script type="text/javascript">
    document.getElementById("searchEmployeeButton").onclick = function () {
        // Link to employee search
    };
</script>

<button id="addEmployeeButton" class="button"><span>Add Employee</span></button>
<script type="text/javascript">
    document.getElementById("addEmployeeButton").onclick = function () {
        // Link to employee add
    };
</script>



<button id="deleteEmployeeButton" class="button"><span>Delete Employee</span></button>
<script type="text/javascript">
    document.getElementById("deleteEmployeeButton").onclick = function () {
        // Link to employee delete
    };
</script>
<br><br>


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
