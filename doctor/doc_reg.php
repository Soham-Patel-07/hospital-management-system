<?php
session_start();
include("headers.php");
include("dbconnection.php");

if (isset($_POST['submit'])) {
    $sql = "INSERT INTO doctor(doctorname, mobileno, departmentid, loginid, password, status, education, experience, consultancy_charge) 
            VALUES ('$_POST[doctorname]', '$_POST[mobilenumber]', '$_POST[select3]', '$_POST[loginid]', '$_POST[password]', 'Active', '$_POST[education]', '$_POST[experience]', '$_POST[consultancy_charge]')";
    if ($qsql = mysqli_query($con, $sql)) {
        echo "<script>alert('Doctor record inserted successfully...');</script>";
		echo "<script>window.location='doctorlogin.php';</script>";
    } else {
        echo mysqli_error($con);
    }
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first" style="background-color: #ff5733; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;"> New Doctor Details </li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Enter Doctor Record</h1>
    <form method="post" action="" name="frmdoct" onSubmit="return validateform()">
      <table width="418" border="3">
        <tbody>
          <tr>
            <td width="34%">Doctor Name</td>
            <td width="66%"><input type="text" name="doctorname" id="doctorname" /></td>
          </tr>
          <tr>
            <td>Mobile Number</td>
            <td><input type="text" name="mobilenumber" id="mobilenumber" /></td>
          </tr>
          <tr>
            <td>Department</td>
            <td>
              <select name="select3" id="select3">
                <option value="">Select</option>
                <?php
                $sqldepartment = "SELECT * FROM department WHERE status='Active'";
                $qsqldepartment = mysqli_query($con, $sqldepartment);
                while ($rsdepartment = mysqli_fetch_array($qsqldepartment)) {
                  echo "<option value='$rsdepartment[departmentid]'>$rsdepartment[departmentname]</option>";
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Login ID</td>
            <td><input type="text" name="loginid" id="loginid" /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password" /></td>
          </tr>
          <tr>
            <td>Education</td>
            <td><input type="text" name="education" id="education" /></td>
          </tr>
          <tr>
            <td>Experience</td>
            <td><input type="text" name="experience" id="experience" /></td>
          </tr>
          <tr>
            <td>Consultancy Charge</td>
            <td><input type="text" name="consultancy_charge" id="consultancy_charge" /></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <select name="select" id="select">
                <option value="">Select</option>
                <option value="Active">Active</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script type="application/javascript">
var alphaExp = /^[a-zA-Z\s!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+$/;

var alphaspaceExp = /^[a-zA-Z\s]+$/;
var numericExpression = /^[0-9]+$/;
var alphanumericExp = /^[0-9a-zA-Z]+$/;

function validateform() {
  if (document.frmdoct.doctorname.value == "") {
    alert("Doctor name should not be empty.");
    document.frmdoct.doctorname.focus();
    return false;
  }
  if (!document.frmdoct.doctorname.value.match(alphaspaceExp)) {
    alert("Doctor name not valid.");
    document.frmdoct.doctorname.focus();
    return false;
  }
  if (document.frmdoct.mobilenumber.value == "") {
    alert("Mobile number should not be empty.");
    document.frmdoct.mobilenumber.focus();
    return false;
  }
  if (!document.frmdoct.mobilenumber.value.match(numericExpression)) {
    alert("Mobile number not valid.");
    document.frmdoct.mobilenumber.focus();
    return false;
  }
  if (document.frmdoct.select3.value == "") {
    alert("Department should not be empty.");
    document.frmdoct.select3.focus();
    return false;
  }
  if (document.frmdoct.loginid.value == "") {
    alert("Login ID should not be empty.");
    document.frmdoct.loginid.focus();
    return false;
  }
  if (!document.frmdoct.loginid.value.match(alphanumericExp)) {
    alert("Login ID not valid.");
    document.frmdoct.loginid.focus();
    return false;
  }
  if (document.frmdoct.password.value == "") {
    alert("Password should not be empty.");
    document.frmdoct.password.focus();
    return false;
  }
  if (document.frmdoct.password.value.length < 6) {
    alert("Password length should be more than 6 characters.");
    document.frmdoct.password.focus();
    return false;
  }
  if (document.frmdoct.education.value == "") {
    alert("Education should not be empty.");
    document.frmdoct.education.focus();
    return false;
  }
  if (!document.frmdoct.education.value.match(alphaExp)) {
    alert("Education not valid.");
    document.frmdoct.education.focus();
    return false;
  }
  if (document.frmdoct.experience.value == "") {
    alert("Experience should not be empty.");
    document.frmdoct.experience.focus();
    return false;
  }
  if (!document.frmdoct.experience.value.match(numericExpression)) {
    alert("Experience not valid.");
    document.frmdoct.experience.focus();
    return false;
  }
  if (document.frmdoct.select.value == "") {
    alert("Kindly select the status.");
    document.frmdoct.select.focus();
    return false;
  }
  return true;
}
</script>
