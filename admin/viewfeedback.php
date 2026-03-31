<?php
session_start();
include("headers.php");
include("dbconnection.php");

// Handle reply submission
if (isset($_POST['reply_submit'])) {
    $feedback_id = $_POST['feedback_id'];
    $reply = $_POST['reply'];

    $sql = "UPDATE feedback SET reply='$reply' WHERE fid='$feedback_id'";
    $qsql = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Reply added successfully.');</script>";
    } else {
        echo "<script>alert('Failed to add reply.');</script>";
    }
}

// Handle feedback deletion
if (isset($_GET['delid'])) {
    $sql = "DELETE FROM feedback WHERE fid='$_GET[delid]'";
    $qsql = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Feedback deleted successfully.');</script>";
    }
}
?>

<div class="wrapper col2">
    <div id="breadcrumb">
        <ul>
            <li class="first">View Feedbacks</li>
        </ul>
    </div>
</div>

<div class="wrapper col4">
    <div id="container">
        <section class="container">
            <h2>Feedback List</h2>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Feedback ID</th>
                        <th>Patient ID</th>
                        <th>Feedback</th>
                        <th>Reply</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM feedback";
                    $qsql = mysqli_query($con, $sql);

                    while ($rs = mysqli_fetch_array($qsql)) {
                        echo "<tr>
                            <td>$rs[fid]</td>
                            <td>$rs[patientid]</td>
                            <td>$rs[comments]</td>
                            <td>" . ($rs['reply'] ? $rs['reply'] : 'No reply yet') . "</td>
                            <td>
                                <form method='POST' action='' style='display: inline;'>
                                    <input type='hidden' name='feedback_id' value='$rs[fid]'>
                                    <input type='text' name='reply' placeholder='Write a reply...' required>
                                    <button type='submit' name='reply_submit'>Reply</button>
                                </form>
                                <a href='viewfeedback.php?delid=$rs[fid]' onclick='return confirm(\"Are you sure you want to delete this feedback?\");'>Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</div>

<?php
include("footers.php");
?>
