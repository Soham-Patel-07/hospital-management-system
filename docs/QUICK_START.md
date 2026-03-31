# Quick Start Guide

## Running the Project Locally

### Step 1: Install XAMPP
Download and install XAMPP from: https://www.apachefriends.org/

### Step 2: Start Services
1. Open XAMPP Control Panel
2. Click "Start" for Apache
3. Click "Start" for MySQL

### Step 3: Setup Database
1. Open browser and go to: http://localhost/phpmyadmin
2. Create a new database named: `hospital`
3. Click on the `hospital` database
4. Go to "Import" tab
5. Select the SQL file from `db/` folder
6. Click "Go" to import

### Step 4: Run the Project
1. Copy the `hospital` folder to `C:\xampp\htdocs\`
2. Open browser and go to: http://localhost/hospital/

---

## Default Login Credentials

### Admin Access
- URL: http://localhost/hospital/admin/adminlogin.php
- Login ID: admin
- Password: admin123

### Doctor Access
- URL: http://localhost/hospital/doctor/doctorlogin.php
- Click "Register Here" to create new doctor account

### Patient Access  
- URL: http://localhost/hospital/patient/patientlogin.php
- Click "Click Here to Register" for new patient account

---

## Troubleshooting

### Issue: Blank Page
- Make sure Apache and MySQL are running
- Check PHP version compatibility
- Enable error reporting in PHP

### Issue: Database Connection Error
- Verify MySQL is running
- Check database name is `hospital`
- Check credentials in dbconnection.php

### Issue: CSS Not Loading
- Clear browser cache
- Check assets folder exists
- Verify path in header files

---

## Testing the Application

1. **Register a new patient**
2. **Book an appointment**
3. **Login as doctor**
4. **Approve the appointment**
5. **Create a prescription**
6. **Login as admin**
7. **Verify all records**

---

## Project Info

- **Course:** M.Sc. Computer Science
- **University:** University of East London
- **Submission:** December 2024
- **Group:** 4 Members
