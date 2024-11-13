<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("Location: ../accountCreation/accountCreation.html");
    exit();
}

if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success'>{$_SESSION['message']}</div>";
    unset($_SESSION['message']);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APGORRS Landing Page</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap and Vendor CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="farmStyles.css">
    <style>
        .crop-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .crop-group {
            flex: 1;
            min-width: 200px;
        }
        
        @media (max-width: 768px) {
            .crop-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/FARMERS UI/farmerLanding/landing.html">
                    <img src="assets/logo.png" alt="APGORRS Logo" width="50">
                    <div class="brand-text-wrapper">
                        <span class="brand-text">APGORRS</span>
                        <span class="brand-subtext">Agricultural Profile Gateway Online Registration and Reporting System</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../farmerLanding/about.html">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="../farmerLanding/faq.html">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="../farmerLanding/contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="../farmerLogin/farmerlogin.html">Login</a></li>
                        <li class="nav-item"><a class="btn btn-warning" href="../registration/registration_form.html">REGISTER</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <form action="submitFarmInfo.php" method="POST" enctype="multipart/form-data" id="farmForm">

            <h2>FARM PARCEL INFORMATION</h2>
            <hr><h3></h3>
            <!-- Farm Location, Total Farm Area, and Ownership Type Side by Side -->
            <div class="form-row">
                <div class="form-group">
                    <label for="farm-location">Farm Location (Barangay):</label>
                    <select id="farm-location" name="farm_location" required>
                        <option value="adya">Adya</option>
                        <option value="anilao">Anilao</option>
                        <option value="anilao-labac">Anilao-Labac</option>
                        <option value="antipolodelnorte">Antipolo del Norte</option>
                        <option value="antipolodelsur">Antipolo del Sur</option>
                        <option value="bagongpook">Bagong Pook</option>
                        <option value="balintawak">Balintawak</option>
                        <option value="banaybanay">Banaybanay</option>
                        <option value="bolbok">Bolbok</option>
                        <option value="bugtongnapulo">Bugtong na Pulo</option>
                        <option value="bulacnin">Bulacnin</option>
                        <option value="bulaklakan">Bulaklakan</option>
                        <option value="calamias">Calamias</option>
                        <option value="cumba">Cumba</option>
                        <option value="dagatan">Dagatan</option>
                        <option value="duhatan">Duhatan</option>
                        <option value="halang">Halang</option>
                        <option value="inosluban">Inosluban</option>
                        <option value="kayumanggi">Kayumanggi</option>
                        <option value="latag">Latag</option>
                        <option value="lodlod">Lodlod</option>
                        <option value="lumbang">Lumbang</option>
                        <option value="mabini">Mabini</option>
                        <option value="malagonlong">Malagonlong</option>
                        <option value="malitlit">Malitlit</option>
                        <option value="marauoy">Marauoy</option>
                        <option value="mataasnalupa">Mataas na Lupa</option>
                        <option value="muntingpulo">Munting Pulo</option>
                        <option value="pagolinginbata">Pagolingin Bata</option>
                        <option value="pagolingineast">Pagolingin East</option>
                        <option value="pagolinginwest">Pagolingin West</option>
                        <option value="pangao">Pangao</option>
                        <option value="pinagkawitan">Pinagkawitan</option>
                        <option value="pinagtongulan">Pinagtongulan</option>
                        <option value="plaridel">Plaridel</option>
                        <option value="poblacionbarangay1">Poblacion Barangay 1</option>
                        <option value="poblacionbarangay2">Poblacion Barangay 2</option>
                        <option value="poblacionbarangay3">Poblacion Barangay 3</option>
                        <option value="poblacionbarangay4">Poblacion Barangay 4</option>
                        <option value="poblacionbarangay5">Poblacion Barangay 5</option>
                        <option value="poblacionbarangay6">Poblacion Barangay 6</option>
                        <option value="poblacionbarangay7">Poblacion Barangay 7</option>
                        <option value="poblacionbarangay8">Poblacion Barangay 8</option>
                        <option value="poblacionbarangay9">Poblacion Barangay 9</option>
                        <option value="poblacionbarangay9a">Poblacion Barangay 9-A</option>
                        <option value="poblacionbarangay10">Poblacion Barangay 10</option>
                        <option value="poblacionbarangay11">Poblacion Barangay 11</option>
                        <option value="poblacionbarangay12">Poblacion Barangay 12</option>
                        <option value="pusil">Pusil</option>
                        <option value="quezon">Quezon</option>
                        <option value="rizal">Rizal</option>
                        <option value="sabang">Sabang</option>
                        <option value="sampaguita">Sampaguita</option>
                        <option value="sanbenito">San Benito</option>
                        <option value="sancarlos">San Carlos</option>
                        <option value="sancelestino">San Celestino</option>
                        <option value="sanfrancisco">San Francisco</option>
                        <option value="sanguillermo">San Guillermo</option>
                        <option value="sanjose">San Jose</option>
                        <option value="sanlucas">San Lucas</option>
                        <option value="sansalvador">San Salvador</option>
                        <option value="sansebastian">San Sebastian</option>
                        <option value="santonino">Santo Niño</option>
                        <option value="santoribio">Santo Toribio</option>
                        <option value="sapac">Sapac</option>
                        <option value="sico">Sico</option>
                        <option value="talisay">Talisay</option>
                        <option value="tambo">Tambo</option>
                        <option value="tangob">Tangob</option>
                        <option value="tanguay">Tanguay</option>
                        <option value="tibig">Tibig</option>
                        <option value="tipacan">Tipacan</option>
                    </select><br>
                </div>
                <div class="form-group">
                    <label for="farm-area">Total Farm Area (in hectares):</label>
                    <input type="text" id="farm-area" name="farm_area" min="0" step="0.01" placeholder="Enter farm area" required>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="numParcels">Number of Farm Parcels:</label>
                <input type="number" id="numParcels" name="numParcels" min="1" required onchange="generateParcelFields()">
                <div id="parcelFields"></div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group">
                    <label for="farmType">Farm Type:</label>
                    <select id="farmType" name="farmType" required>
                        <option value="irrigated">Irrigated</option>
                        <option value="rainfed_upland">Rainfed Upland</option>
                        <option value="rainfed_lowland">Rainfed Lowland</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="organic">Organic Practitioner:</label>
                    <select id="organic" name="organic" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select><br>
                </div>
            </div>
            <hr>
            <div class="button-container">
                <button type="submit">Submit Farm Parcel Information</button>
                <button type="button" onclick="window.location.href='../../index.html';">Cancel</button>

            </div>
            
        </form>
    </div>

    <script src="farmForm.js"></script>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-left">
            <p>© 2024 All Rights Reserved</p>
        </div>
        <div class="footer-right">
            <p>Lipa City Agricultural Office</p>
        </div>
    </footer>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>