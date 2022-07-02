<?php
header('Content-type:application/json');
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "ecom_db";

// Create connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $products = array( 'products' => $rows );
    echo json_encode($products);
} else {
    echo "no results found";
}

?>