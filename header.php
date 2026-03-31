<?php
// Suppress error reporting for cleaner output during development
error_reporting(0);
include("dbconnection.php");

// Set current date and time
$current_date = date("Y-m-d");
$current_time = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cell Oasis</title>
    <link rel="stylesheet" href="layout/styles/layout.css" type="text/css">
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin: 20px;
        }

        /* Navigation Bar */
        #topnav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #4CAF50;
        }

        #topnav ul li {
            margin: 0 10px;
        }

        #topnav ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #topnav ul li a.active,
        #topnav ul li a:hover {
            background-color: #3e8e41;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content a {
            text-decoration: none;
            color: black;
            padding: 10px 15px;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Form Inputs */
        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 75%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="wrapper col1">
        <center><a href="index.php"><h1>Cell Oasis</h1></a></center>
        <div id="head">
            <div id="topnav">
                <ul>
                    <li><a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == "index.php" ? 'active' : '' ?>">Home</a></li>
                    <!-- <li><a href="aboutus.php" class="<?= basename($_SERVER['PHP_SELF']) == "aboutus.php" ? 'active' : '' ?>">About Us</a></li> -->
                    <?php if (!isset($_SESSION['patientid'])): ?>
                        <li><a href="patientappointment.php" class="<?= basename($_SERVER['PHP_SELF']) == "patientappointment.php" ? 'active' : '' ?>">Online Appointment</a></li>
                        <li><a href="patient/patientlogin.php" class="<?= basename($_SERVER['PHP_SELF']) == "patientlogin.php" ? 'active' : '' ?>">Login</a></li>
                        <li><a href="patient/patient.php" class="<?= basename($_SERVER['PHP_SELF']) == "patient.php" ? 'active' : '' ?>">Registration</a></li>
                    <?php else: ?>
                        <li><a href="patientappointment.php" class="<?= basename($_SERVER['PHP_SELF']) == "patientappointment.php" ? 'active' : '' ?>">Online Appointment</a></li>
                    <?php endif; ?>
                    <li><a href="contactus.php" class="<?= basename($_SERVER['PHP_SELF']) == "contactus.php" ? 'active' : '' ?>">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div style="text-align:center">
        <?php include("menu.php"); ?>
    </div>
</body>
</html>
