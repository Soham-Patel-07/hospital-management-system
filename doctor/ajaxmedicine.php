<?php
include("dbconnection.php");

if (isset($_GET['medicineid'])) {
    $medicineid = $_GET['medicineid'];
    $sql = "SELECT medicinecost FROM medicine WHERE medicineid='$medicineid'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['medicinecost']; 
    } else {
        echo "0.00"; 
    }
} else {
    echo "0.00"; 
}
?>
