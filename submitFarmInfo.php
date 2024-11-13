<?php
session_start();

$host = "localhost";
$dbname = "apgorrs_db";
$username = "root"; 
$password = ""; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['farmType'])) {
        die("Farm Type is required.");
    }

    $farmLocation = $_POST['farm_location'];
    $farmArea = $_POST['farm_area'];
    $numParcels = $_POST['numParcels'];
    $farmType = $_POST['farmType'];
    $organic = $_POST['organic'];

    if (!isset($_SESSION['uname'])) {
        die("User not logged in.");
    }
    $created_by = $_SESSION['uname'];

    try {
        $stmt = $pdo->prepare("INSERT INTO farm_parcels (farm_location, farm_area, num_parcels, farm_type, organic, created_by) 
                               VALUES (:farm_location, :farm_area, :num_parcels, :farm_type, :organic, :created_by)");

        $stmt->execute([
            ':farm_location' => $farmLocation,
            ':farm_area' => $farmArea,
            ':num_parcels' => $numParcels,
            ':farm_type' => $farmType,
            ':organic' => $organic,
            ':created_by' => $created_by
        ]);

        $farmParcelId = $pdo->lastInsertId();

        for ($i = 1; $i <= $numParcels; $i++) {
            $location = $_POST["location_$i"];
            $totalArea = $_POST["totalArea_$i"];
            $ownershipType = $_POST["ownership_$i"];
            $cropCommodity = $_POST["crop_$i"];
            $cropType = $_POST["cropType_$i"];
            $cropVariety = $_POST["cropVariety_$i"];
            $numTrees = !empty($_POST["numTrees_$i"]) ? $_POST["numTrees_$i"] : null;
            $treeStatus = !empty($_POST["treeStatus_$i"]) ? $_POST["treeStatus_$i"] : null;

            $parcelStmt = $pdo->prepare("INSERT INTO parcel_details 
                (farm_parcel_id, location, total_area, ownership_type, crop_commodity, crop_type, crop_variety, num_trees, tree_status, created_by)
                VALUES (:farm_parcel_id, :location, :total_area, :ownership_type, :crop_commodity, :crop_type, :crop_variety, :num_trees, :tree_status, :created_by)");

            $parcelStmt->execute([
                ':farm_parcel_id' => $farmParcelId,
                ':location' => $location,
                ':total_area' => $totalArea,
                ':ownership_type' => $ownershipType,
                ':crop_commodity' => $cropCommodity,
                ':crop_type' => $cropType,
                ':crop_variety' => $cropVariety,
                ':num_trees' => $numTrees,
                ':tree_status' => $treeStatus,
                ':created_by' => $created_by
            ]);
        }

        $_SESSION['message'] = "Farm parcel and details added successfully!";
        header("Location: ../farmerLogin/farmerlogin.html");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
}
?>