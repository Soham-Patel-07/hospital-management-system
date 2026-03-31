<?php
include("dbconnection.php");
echo "DB Connected successfully";
echo "<br>";
echo "Patient table rows: " . mysqli_num_rows(mysqli_query($con, "SELECT * FROM patient"));
?>
