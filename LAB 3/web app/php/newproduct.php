<?php

if (isset($_POST["submit"])){
    include_once("../dbconnect.php");
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $sqlregister = "INSERT INTO tbl_product(name, price, description) 
    VALUES('$name', '$price', '$description')";
  
    try {
    $conn->exec($sqlregister);
    if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file ($_FILES["fileToUpload"]["tmp_name"])) {
    uploadImage($name);
    }
    echo "<script>alert('Registration successful')</script>";
    echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
    echo "<script>alert('Registration failed')</script>";
    echo "<script>window.location.replace('newproduct.php')</script>";
    }
}
    
  function uploadImage($name)
    {
    $target_dir = "../res/images";
    $target_file = $target_dir . $name . ".png"; 
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
       
?>
<style>
   /* Full height image header */
   .bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("../res/photo.jpg");
    min-height: 100%;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<script src="../javascript/script.js"></script>
<title>AMIRUL THAI & MALAY RESTAURANT</title>
</head>

<body>
     <!-- Header with full-height image -->
  <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-black" style="padding:64px">
    <h1 style="font-size:calc(8px + 4vw);">Amirul Thai & Malay Restaurant</h1>
        <p style="font-size:calc(8px + 1vw);;">One dinner that combines Thai and Malay tastes. It is our pleasure to serve you!</p>
    
    <!-- <span class="w3-jumbo">Amirul Thai & Malay Restaurant</span><br>
      <span class="w3-large">One dinner that combines Thai and Malay tastes. It is our pleasure to serve you!</span>
    </div>  -->
  </header>
   
  <!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">AMIRUL THAI & MALAY RESTAURANT</a>

    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="mainpage.php" class="w3-bar-item w3-button">HOME</a> 
    </div>
    </div>
    </div>


    <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card">
            <!-- Insert the title div here -->

        <div class="w3-container w3-pale-red">
        <p>New Product<p>
    </div>

    <form class="w3-container w3-padding" name="registerForm" action="newproduct.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmDialog()">
       <p> 
            <div class="w3-container w3-border w3-center w3-padding">
            <img class="w3-image w3-round w3-margin" src="../res/picturefood.png" style="width:100%; max-width:600px"><br>
            <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
        </div></p>
        <p>
        <i class = "fa fa-edit icon "></i>
            <label>Name</label>
            <input class="w3-input w3-border w3-round" name="name" id="idname" type="text" required>
        </p>
        <p>
        <i class = "fa fa-dollar icon "></i>
            <label>Price</label>
            <input class="w3-input w3-border w3-round" name="price" id="idprice" type="text" required>
        </p>
        <p>
        <i class = "fa fa-info icon "></i>
            <label>Description</label>
            <textarea class="w3-input w3-border"  name="description" id="iddescription" rows="4" cols="50" width="100%" placeholder="Please enter your description" required></textarea>
        </p>

        <div class="row">
            <input class="w3-input w3-border w3-block w3-pale-red w3-round" type="submit" name="submit" value="Submit">
        </div>    
    </form>
        </div>
    </div>

  <!-- Footer -->
  <footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-pinterest-p w3-hover-opacity"></i>
      <i class="fa fa-twitter w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
        class="w3-hover-text-green">w3.css</a></p>
        <div class="col-md-6">
        <p class="mb-0">© 2021 copyright all right reserved | Designed by <a class="text-white">Amirul Thai & Malay Restaurant</a></p>
      </div>
  </footer>
  

</body>

</html>