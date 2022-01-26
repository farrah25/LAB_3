<?php
include_once("../dbconnect.php");
$sqlproduct = "SELECT * FROM tbl_product ORDER BY productDate DESC";
$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();


$results_per_page = 5;
if (isset($_GET['pageno']))
{
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
}
else
{
    $pageno = 1;
    $page_first_result = 0;

}

$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);
$sqlproduct = $sqlproduct . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqlproduct);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

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

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">AMIRUL THAI & MALAY RESTAURANT</a>
 
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
      onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
    

    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="newproduct.php" class="w3-bar-item w3-button">NEW PRODUCT</a>
      <a href="#Product" class="w3-bar-item w3-button">LIST PRODUCT</a>
    </div>
    </div>
    </div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-hide-medium w3-hide-large"
  style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="newproduct.php" onclick="w3_close()" class="w3-bar-item w3-button">NEW PRODUCT</a>
  <a href="#Product" onclick="w3_close()" class="w3-bar-item w3-button">LIST PRODUCT</a>
</nav>

    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
      onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption" class="w3-opacity w3-large"></p>
    </div>
  </div>

  <!-- Header with full-height image 
  <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-black" style="padding:64px">
      <span class="w3-jumbo w3-center">Amirul Thai & Malay Restaurant</span><br>
      <span class="w3-large w3-center">One dinner that combines Thai and Malay tastes. It is our pleasure to serve you!</span><br>
    </div>
  </header> -->

  <!--<div class="w3-header w3-container w3-pale-red w3-padding-32 w3-center">  -->
  <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-black" style="padding:64px">
        <h1 style="font-size:calc(8px + 4vw);">Amirul Thai & Malay Restaurant</h1>
        <p style="font-size:calc(8px + 1vw);;">One dinner that combines Thai and Malay tastes. It is our pleasure to serve you!</p>
    </div> 
  </header> 

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
<!-- Project Section -->
<div class="w3-container w3-padding-32" id="Product">
    <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16"><b>List of product<b></h2>
  </div>
  </div>  


  <div class="w3-grid-template">
<?php
foreach($rows as $product){

    $name = $product['name'];
    $price = $product['price'];
    $description = $product['description'];
    echo "<div class='w3-center w3-padding'>";
    echo "<div class='w3-card-4 w3-light-grey '>";
    echo "<header class='w3-container w3-pale-red'>";
    echo "<h5>$name</h5>";
    echo "</header>";
    echo "<img class='w3-image' src=../res/images/$name.png" ." onerror=this.onerror=null;this.src='../res/food.png'" . " style='width:100%;height:250px'>";
    echo "<div class='w3-container w3-center-align'><hr>";
    echo "<p><i class='fa fa-edit ' style='font-size 16px;'>  Menu : &nbsp&nbsp$name </i> 
    <br> <i class='fa fa-dollar' style='font-size 16px;'> Price : RM&nbsp&nbsp$price  </i> 
    <br> <i class='fa fa-info ' style='font-size 15px;'> Description :  &nbsp&nbsp$description  </i></p><hr>";  
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>

<!-- End page content -->
</div>

<br>

<?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + $results_per_page;
    } else {
        $num = $pageno * $results_per_page - 9;
    }
    echo "<div class='w3-container w3-row'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "mainpage.php?pageno=' . $page . '" style=
        "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>

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

  <script>
    // Modal Image Gallery
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }

    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
      } else {
        mySidebar.style.display = 'block';
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
    }
  </script>
</body>
</html>