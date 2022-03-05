<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election</title>

    <link rel="stylesheet" href="resources/css/bootstrap.min.css">


    <link rel="stylesheet" href="resources/css/mystyle.css">

</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><h3 id="nav_txt">Election Result</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><h5 id="nav_txt">Question1 </h5></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index1.php" target="_blank"><h5 id="nav_txt">Question 2 </h5></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index2.php" target="_blank"><h5 id="nav_txt">Question 3 </h5></a>
            </li>
            </ul>
        </div>
    </nav>
    <!-- End Of Navigation -->

<div class="container">
<!-- Polling unit card -->
<div class="card">
    <div class="card-header header_cl">
        <h1 id="header_txt">These are the Individual pulling units in all the Local Governments of Delta State<span>(click to show result of each individual polling unit)</span>
        </h1>
    </div>



<div class="card-body cb">


<?php
        
        
require "pullingunitname.php"; 



?>

</div>



    </div>
    <!-- end of pulling unit card -->
</div>


    <!-- links to javascript -->
    <script src="resources/js/jquery.js"></script>
    <script src="resources/js/bootstrap.min.js"></script>
    <script src="resources/js/myscript.js"></script>
</body>
</html>