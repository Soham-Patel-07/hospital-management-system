<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    echo "<script>window.location='adminlogin.php';</script>";
}
include("dbconnection.php");
include("headers.php");
?>
<style>
/* Main container styling */
.wrapper {
    padding: 20px;
    font-family: Arial, sans-serif;
}

/* Grid styling for boxes */
#count-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Box styling */
.count-box {
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.count-box h2 {
    font-size: 1.8rem;
    margin: 5px 0;
    color: #007bff;
}

.count-box p {
    font-size: 1rem;
    color: #555;
}

.count-box strong {
    font-size: 1.1rem;
}

/* Chart container styling */
#chart {
    margin-top: 30px;
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>

<div class="wrapper">
    <div id="breadcrumb">
        <form method="get" action="">
            <strong>Date:</strong>
            <input type="date" name="date" value="<?php echo $_GET['date']; ?>">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <div id="count-container">
        <?php
        $counts = [
            "Number of Doctors" => "SELECT * FROM doctor WHERE status='Active'",
            "Number of Patients" => "SELECT * FROM patient WHERE status='Active'",
            "Number of Appointments" => "SELECT * FROM appointment WHERE status='Active'",
            "Number of Medicines" => "SELECT * FROM prescription WHERE status='Active'",
            "Number of Departments" => "SELECT * FROM department WHERE status='Active'"
        ];

        if (isset($_GET['date'])) {
            $dateFilter = $_GET['date'];
            $counts["Number of Appointments"] .= " AND appointmentdate ='$dateFilter'";
            $counts["Number of Patients"] .= " AND admissiondate ='$dateFilter'";
            $counts["Number of Medicines"] .= " AND prescriptiondate ='$dateFilter'";
        }

        $chartData = [];
        foreach ($counts as $title => $query) {
            $qsql = mysqli_query($con, $query);
            $count = mysqli_num_rows($qsql);
            $chartData[] = ["label" => $title, "count" => $count];
            echo "
            <div class='count-box'>
                <h2>$count</h2>
                <p><strong>$title</strong></p>
            </div>";
        }
        ?>
    </div>

    <div id="chart"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
// Parse PHP data for chart
const chartData = <?php echo json_encode($chartData); ?>;

// Prepare data for ApexCharts
const labels = chartData.map(item => item.label);
const counts = chartData.map(item => item.count);

const options = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [{
        name: 'Count',
        data: counts
    }],
    xaxis: {
        categories: labels
    },
    colors: ['#007bff'],
    title: {
        text: 'Summary Statistics',
        align: 'center'
    }
};

// Render chart
const chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>

<?php
include("footers.php");
?>
