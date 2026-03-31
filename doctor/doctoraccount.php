<?php
session_start();
if(!isset($_SESSION['doctorid'])) {
    echo "<script>window.location='doctorlogin.php';</script>";
}
include("headers.php");
?>
<style>
.wrapper {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    padding: 20px;
}

#count-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

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

#chart {
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Doctor Account</li>
    </ul>
  </div>
</div>

<div class="wrapper col4">
  <div id="container">
    <h1>Welcome <?php echo $rsdoctorprofile['doctorname']; ?> </h1>
    <div class="wrapper">
      <div id="count-container">
        <div class="count-box">
          <h2>
            <?php
            $sql = "SELECT * FROM appointment WHERE status='Active'";
            $qsql = mysqli_query($con, $sql);
            $appointmentCount = mysqli_num_rows($qsql);
            echo $appointmentCount;
            ?>
          </h2>
          <p><strong>Number of Appointment Records</strong></p>
        </div>
        <div class="count-box">
          <h2>
            <?php
            $sql = "SELECT * FROM patient WHERE status='Active'";
            $qsql = mysqli_query($con, $sql);
            $patientCount = mysqli_num_rows($qsql);
            echo $patientCount;
            ?>
          </h2>
          <p><strong>Number of Patient Records</strong></p>
        </div>
      </div>

      <div id="chart"></div>
    </div>
  </div>
</div>

<div class="clear"></div>
</div>

<?php
include("footers.php");
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
const chartData = [
  { label: "Appointments", count: <?php echo $appointmentCount; ?> },
  { label: "Patients", count: <?php echo $patientCount; ?> }
];

const labels = chartData.map(item => item.label);
const counts = chartData.map(item => item.count);

const options = {
  chart: {
    type: 'pie',  // Changed to 'pie' chart
    height: 350
  },
  series: counts,  // Data to be used for the pie chart
  labels: labels,  // Labels for the pie chart sections
  colors: ['#007bff', '#28a745'],  // Custom colors for the chart sections
  title: {
    text: 'Summary Statistics',
    align: 'center'
  }
};

const chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
