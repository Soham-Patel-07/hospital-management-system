<?php
session_start();
include("dbconnection.php");

if (!isset($_SESSION['patientid'])) {
    echo "<script>window.location='patientlogin.php';</script>";
}

// Handle feedback submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $feedback = $_POST['feedback'];
    $patientid = $_SESSION['patientid'];

    if (!empty($feedback)) {
        $stmt = $con->prepare("INSERT INTO feedback (patientid, comments) VALUES (?, ?)");
        $stmt->bind_param("is", $patientid, $feedback);
        if ($stmt->execute()) {
            echo "<script>alert('Feedback submitted successfully!');</script>";
        } else {
            echo "<script>alert('Failed to submit feedback.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Feedback cannot be empty.');</script>";
    }
}

include("headers.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
           
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }
        .wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }
        .feedback-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .feedback-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .feedback-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        .feedback-container button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .feedback-container button:hover {
            background-color: #0056b3;
        }
        .feedback-reply {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-left: 20px;
        }
        .feedback-reply h3 {
            margin-bottom: 10px;
        }
        .feedback-reply p {
            margin-bottom: 10px;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="feedback-container">
                <h2>Submit Your Feedback</h2>
                <form method="POST" action="">
                    <textarea id="feedback" name="feedback" rows="5" placeholder="Write your feedback here..." required></textarea><br>
                    <button type="submit">Submit Feedback</button>
                </form>
            </div>

            <!-- Feedback Reply Section -->
            <div class="feedback-reply">
                <h3>Admin's Reply</h3>
                <?php
                // Get the latest feedback for the logged-in user
                $patientid = $_SESSION['patientid'];
                $sql = "SELECT * FROM feedback WHERE patientid = '$patientid' ORDER BY fid DESC LIMIT 1";
                $result = mysqli_query($con, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                    echo "<p><strong>Feedback:</strong> " . $row['comments'] . "</p>";
                    if ($row['reply']) {
                        echo "<p><strong>Admin's Reply:</strong> " . $row['reply'] . "</p>";
                    } else {
                        echo "<p><strong>Admin has not replied yet.</strong></p>";
                    }
                } else {
                    echo "<p>No feedback found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("footers.php");
?>
