<?php
session_start();
include("dbconnection.php");

if (isset($_SESSION['patientid'])) {
    echo "<script>window.location='patientaccount.php';</script>";
}

if (isset($_POST['submit'])) {
    $loginid = mysqli_real_escape_string($con, $_POST['loginid']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "SELECT * FROM patient WHERE email='$loginid' AND password='$password' AND status='Active'";
    $qsql = mysqli_query($con, $sql);
    if (mysqli_num_rows($qsql) == 1) {
        $rslogin = mysqli_fetch_array($qsql);
        $_SESSION['patientid'] = $rslogin['patientid'];
        echo "<script>window.location='patientaccount.php';</script>";
    } else {
        echo "<script>alert('Invalid login ID and password entered.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Login - Cell Oasis</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; padding: 50px; }
        .login-box { max-width: 400px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #04acec; }
        input { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        .btn { background: #04acec; color: white; border: none; padding: 12px; width: 100%; cursor: pointer; }
        .btn:hover { background: #0398db; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Cell Oasis - Patient Login</h2>
        <form method="post" name="frmpatlogin">
            <input type="email" name="loginid" id="loginid" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login" class="btn">
            <p style="text-align:center">
                New user? <a href="patient.php">Click Here</a> to Register
            </p>
        </form>
    </div>
</body>
</html>
