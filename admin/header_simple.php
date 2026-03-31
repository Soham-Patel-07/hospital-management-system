<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cell Oasis - Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="layout/styles/layout.css">
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .header { background: #04acec; padding: 15px; text-align: center; }
        .header h1 { margin: 0; color: white; }
        .header a { color: white; text-decoration: none; }
        .nav { background: #333; padding: 10px; text-align: center; }
        .nav a { color: white; text-decoration: none; margin: 0 15px; }
        .container { max-width: 960px; margin: 20px auto; padding: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1><a href="../index.php">Cell Oasis - Admin Panel</a></h1>
    </div>
    <div class="nav">
        <a href="../index.php">Home</a>
    </div>
    <div class="container">
