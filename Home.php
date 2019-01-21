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

.topL {
    position: fixed;
    top: 200px;
    right: 1200px;
    border: 10px solid #3e93ab;
}

.topLW {
    position: absolute;
    top: 475px;
    right: 1350px;
    font-size: 20px;
    color: white;
}
.topM {
    position: fixed;
    top:  200px;
    right: 700px; 
    border: 10px solid #3e93ab;
}

.topMW {
    position: absolute;
    top: 475px;
    right: 850px;
    font-size: 20px;
    color: white;
    background-color: black;
}
.topR {
    position: fixed;
    top: 200px;
    right: 300px;
    border: 10px solid #3e93ab;
}

.topRW {
    position: absolute;
    top: 475px;
    right: 450px;
    font-size: 20px;
    color: white;
}
.botL {
    position: fixed;
    top: 600px;
    right: 1200px;
    border: 10px solid #3e93ab;
}

.botLW {
    position: absolute;
    top: 625px;
    right: 1375px;
    font-size: 20px;
    color: white;
}

.botM {
    position: fixed;
    top: 600px;
    right: 700px;
    border: 10px solid #3e93ab;
    display: block;
}

.botMW {
    position: absolute;
    top: 625px;
    right: 850px;
    font-size: 20px;
    color: white;
}

.botR {
   position: fixed;
   top: 600px;
   right: 300px;
   border: 10px solid #3e93ab;
}

.botRW {
   position: absolute;
   top: 625px;
   right: 450px;
   font-size: 20px;
   color: white;
   background-color: grey;
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


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="topnav" id="myTopnav">
<!-- Links to other pages here -->

   <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<p> Zoo Database</p>

<div class="topL" id="picUpL">
  <!-- Link to animal page -->
</div>

<div class="topLW">Animals</div>

<div class="topM" id="picUpR">
   <!-- Link to employee page -->
</div>

<div class="topMW">Employees</div>

<div class="topR" id="picTopR">
   <!-- Link to enclosure page -->
</div>

<div class="topRW">Enclosures</div>

<div class="botL" id="picBotL">
   <!-- Link to food page -->
</div>

<div class="botLW">Food</div>

<div class="botM" id="picBotM">
   <!-- Link to attraction page -->
</div>

<div class="botMW">Attractions</div>

<div class="botR" id="picBotR">
   <!-- Link to medication page -->
</div>
<div class="botRW">Medication</div>


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


</script>
</body>
</html>
