<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['patientid'])) {
    echo "<script>window.location='patientlogin.php';</script>";
}
include("headers.php");

$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatientappointment = mysqli_query($con,$sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);

// Get the number of active appointments for this patient
$appointmentCountQuery = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' AND status='Active'";
$qsqlAppointmentCount = mysqli_query($con, $appointmentCountQuery);
$appointmentCount = mysqli_num_rows($qsqlAppointmentCount);
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
      <li class="first">Patient Account</li>
    </ul>
  </div>
</div>

<div class="wrapper col4">
  <div id="container">
    <h1>This account is registered under <?php echo $rspatient['patientname']; ?> </h1>
    <h1>You have Registered on <?php echo $rspatient['admissiondate']; ?> <?php echo $rspatient['admissiontime']; ?></h1>
    
    <div class="wrapper">
      <div id="count-container">
        <div class="count-box">
          <h2><?php echo $appointmentCount; ?></h2>
          <p><strong>Number of Active Appointments</strong></p>
        </div>
        <div class="count-box">
          <h2><?php echo mysqli_num_rows($qsqlpatient); ?></h2>
          <p><strong>Number of Patient Records</strong></p>
        </div>
      </div>

      <div id="chart"></div>
    </div>
    
    <?php
    if(mysqli_num_rows($qsqlpatientappointment) == 0) {
    ?>
        <h1>Appointment records not found.. </h1>
    <?php
    } else {
    ?>
        <h1>Last Appointment taken on - <?php echo $rspatientappointment['appointmentdate']; ?> <?php echo $rspatientappointment['appointmenttime']; ?> </h1>
    <?php
    }
    ?>      
  </div>
</div>

<div class="clear"></div>
</div>

<?php
include("footers.php");
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
const appointmentDates = <?php
// Fetch appointments over time for the line chart
$sqlAppointmentsOverTime = "SELECT appointmentdate, COUNT(*) as count FROM appointment WHERE patientid='$_SESSION[patientid]' GROUP BY appointmentdate ORDER BY appointmentdate";
$qsqlAppointmentsOverTime = mysqli_query($con, $sqlAppointmentsOverTime);
$appointmentsData = [];
while ($row = mysqli_fetch_array($qsqlAppointmentsOverTime)) {
    $appointmentsData[] = $row;
}
echo json_encode($appointmentsData);
?>;

const dates = appointmentDates.map(item => item.appointmentdate);
const appointmentCounts = appointmentDates.map(item => item.count);

const options = {
  chart: {
    type: 'line',
    height: 350
  },
  series: [{
    name: 'Appointments',
    data: appointmentCounts
  }],
  xaxis: {
    categories: dates,
    title: {
      text: 'Appointment Date'
    }
  },
  yaxis: {
    title: {
      text: 'Number of Appointments'
    }
  },
  title: {
    text: 'Appointments Over Time',
    align: 'center'
  },
  colors: ['#007bff']
};

const chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
