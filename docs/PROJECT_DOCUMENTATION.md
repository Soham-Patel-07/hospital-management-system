# Cell Oasis - Hospital Management System

## Project Overview

**Project Name:** Cell Oasis Hospital Management System  
**Project Type:** Web Application (PHP + MySQL)  
**Course:** M.Sc. Computer Science  
**University:** University of East London  
**Submission Date:** December 2024  
**Group Size:** 4 Members  

---

## 1. Introduction

### 1.1 Project Background
Cell Oasis is a comprehensive hospital management system designed to streamline healthcare operations by providing separate portals for patients, doctors, and administrators. The system facilitates appointment booking, patient management, doctor profiles, treatment records, and prescription management.

### 1.2 Objectives
- To provide a centralized platform for hospital management
- To enable online appointment booking for patients
- To facilitate doctor-patient communication
- To automate appointment approval workflow
- To maintain digital records of patients, treatments, and prescriptions

---

## 2. Technology Stack

| Component | Technology |
|-----------|------------|
| Frontend | HTML, CSS, JavaScript, Bootstrap |
| Backend | PHP |
| Database | MySQL (phpMyAdmin) |
| Server | Apache (XAMPP) |
| Email Integration | PHPMailer |

---

## 3. System Architecture

### 3.1 User Roles
The system has three main user roles:

1. **Administrator**
   - Full control over the system
   - Manage doctors, patients, departments, medicines
   - Approve/reject appointments
   - View reports and statistics

2. **Doctor**
   - Manage patient appointments
   - Create prescriptions
   - Update treatment records
   - View and manage own profile

3. **Patient**
   - Book appointments
   - View appointment status
   - Access prescription records
   - Update personal profile

### 3.2 Directory Structure
```
hospital/
├── admin/           # Admin panel files
├── doctor/          # Doctor panel files
├── patient/         # Patient panel files
├── assets/          # CSS, images, JavaScript
├── layout/          # Layout styles
├── db/              # Database files (if any)
├── phpmail/         # Email functionality
├── js/              # JavaScript files
├── index.php        # Home page
├── aboutus.php      # About us page
├── contactus.php    # Contact page
├── dbconnection.php # Database connection
└── docs/            # Documentation
```

---

## 4. Features

### 4.1 Public Features
- **Home Page**: Welcome page with hospital information
- **About Us**: Hospital information and mission
- **Contact Us**: Contact form for inquiries
- **Department Information**: View available departments
- **Doctor Information**: View doctor profiles and availability

### 4.2 Patient Features
| Feature | Description |
|---------|-------------|
| Registration | Create new patient account |
| Login | Secure authentication |
| Book Appointment | Select doctor, date, time |
| View Appointments | Check appointment status |
| Prescription History | View past prescriptions |
| Profile Management | Update personal information |
| Change Password | Update account password |
| Forgot Password | Password recovery via SMS |

### 4.3 Doctor Features
| Feature | Description |
|---------|-------------|
| Self-Registration | Doctors can register themselves |
| Login | Secure authentication |
| View Appointments | See pending/approved appointments |
| Approve Appointments | Accept or reject patient appointments |
| Create Prescription | Generate prescriptions for patients |
| Treatment Records | Maintain patient treatment history |
| Profile Management | Update qualifications, timing, charges |
| Change Password | Update account password |

### 4.4 Admin Features
| Feature | Description |
|---------|-------------|
| Login | Secure admin authentication |
| Dashboard | Overview of system statistics |
| Department Management | Add/edit/delete departments |
| Doctor Management | Add/edit/delete doctors |
| Patient Management | View/manage patient records |
| Appointment Management | View and approve appointments |
| Medicine Management | Add/edit/delete medicines |
| Treatment Management | Manage treatment records |
| View Feedback | See patient feedback |
| Profile Management | Admin profile settings |
| Reports | View various system reports |

---

## 5. Database Schema

### 5.1 Tables

#### Admin Table
| Field | Type | Description |
|-------|------|-------------|
| adminid | INT | Primary key, auto-increment |
| adminname | VARCHAR(50) | Admin name |
| loginid | VARCHAR(50) | Login username |
| password | VARCHAR(50) | Login password |
| status | ENUM | Active/Inactive |

#### Doctor Table
| Field | Type | Description |
|-------|------|-------------|
| doctorid | INT | Primary key, auto-increment |
| doctorname | VARCHAR(50) | Doctor's name |
| mobileno | VARCHAR(15) | Contact number |
| departmentid | INT | Foreign key to department |
| loginid | VARCHAR(50) | Login username |
| password | VARCHAR(50) | Login password |
| status | ENUM | Active/Inactive |
| education | VARCHAR(100) | Qualifications |
| experience | VARCHAR(50) | Years of experience |
| consultancy_charge | DECIMAL | Consultation fee |

#### Patient Table
| Field | Type | Description |
|-------|------|-------------|
| patientid | INT | Primary key, auto-increment |
| patientname | VARCHAR(50) | Patient's name |
| admissiondate | DATE | Registration date |
| address | TEXT | Full address |
| mobileno | VARCHAR(15) | Contact number |
| email | VARCHAR(50) | Email address |
| city | VARCHAR(30) | City |
| pincode | VARCHAR(10) | PIN code |
| loginid | VARCHAR(50) | Login username |
| password | VARCHAR(50) | Login password |
| bloodgroup | VARCHAR(5) | Blood type |
| gender | ENUM | Male/Female/Other |
| dob | DATE | Date of birth |
| status | ENUM | Active/Inactive/Pending |

#### Appointment Table
| Field | Type | Description |
|-------|------|-------------|
| appointmentid | INT | Primary key |
| patientid | INT | Foreign key to patient |
| doctorid | INT | Foreign key to doctor |
| appointmentdate | DATE | Appointment date |
| appointmenttime | TIME | Appointment time |
| status | ENUM | Pending/Approved/Rejected |
| appointmentreason | TEXT | Reason for visit |

#### Prescription Table
| Field | Type | Description |
|-------|------|-------------|
| prescriptionid | INT | Primary key |
| patientid | INT | Foreign key to patient |
| doctorid | INT | Foreign key to doctor |
| prescriptiondate | DATE | Prescription date |
| prescription | TEXT | Prescription details |

#### Department Table
| Field | Type | Description |
|-------|------|-------------|
| departmentid | INT | Primary key |
| departmentname | VARCHAR(50) | Department name |
| description | TEXT | Department description |
| status | ENUM | Active/Inactive |

#### Medicine Table
| Field | Type | Description |
|-------|------|-------------|
| medicineid | INT | Primary key |
| medicinename | VARCHAR(100) | Medicine name |
| medicinecost | DECIMAL | Medicine cost |
| description | TEXT | Medicine description |
| status | ENUM | Active/Inactive |

#### Treatment Table
| Field | Type | Description |
|-------|------|-------------|
| treatmentid | INT | Primary key |
| patientid | INT | Foreign key to patient |
| doctorid | INT | Foreign key to doctor |
| treatmentdate | DATE | Treatment date |
| treatment | TEXT | Treatment description |

---

## 6. User Manual

### 6.1 Installation Steps
1. Install XAMPP or WAMP server
2. Start Apache and MySQL services
3. Create database named "hospital" in phpMyAdmin
4. Import the SQL file from `db/` folder
5. Copy project files to `htdocs/hospital`
6. Access via `http://localhost/hospital/`

### 6.2 Default Login Credentials

#### Admin
- URL: `http://localhost/hospital/admin/adminlogin.php`
- Login ID: `admin`
- Password: `admin123`

#### Doctor
- URL: `http://localhost/hospital/doctor/doctorlogin.php`
- Register new account or use existing credentials

#### Patient
- URL: `http://localhost/hospital/patient/patientlogin.php`
- Register new account or use existing credentials

---

## 7. Project Timeline

| Phase | Task | Duration |
|-------|------|----------|
| Phase 1 | Requirements Analysis | 2 weeks |
| Phase 2 | Database Design | 1 week |
| Phase 3 | Frontend Development | 3 weeks |
| Phase 4 | Backend Development | 4 weeks |
| Phase 5 | Testing & Debugging | 2 weeks |
| Phase 6 | Documentation | 1 week |

---

## 8. Challenges & Solutions

### 8.1 Challenges Faced
- Session management across multiple user roles
- Database connection issues
- PHP version compatibility
- Bootstrap/CSS integration
- Email notification setup

### 8.2 Solutions Implemented
- Proper session_start() implementation
- Updated mysqli functions for PHP 8+
- Created simplified header/footer templates
- Fixed HTML structure issues

---

## 9. Future Enhancements

- SMS notification system integration
- Email notification for appointments
- Online payment gateway
- Video consultation feature
- Mobile application
- Lab report integration
- Inventory management
- Billing system

---

## 10. Conclusion

Cell Oasis Hospital Management System provides a comprehensive solution for managing hospital operations. The system successfully integrates patients, doctors, and administrators in a single platform, making healthcare management more efficient and accessible.

---

## 11. Team

| Detail |
|--------|
| Group Project - M.Sc. Computer Science, University of East London |

---

## 12. Acknowledgments

We would like to thank our project guide and University of East London faculty for their constant support and guidance throughout this project.

---

*Document Version: 1.0*  
*Date: December 2024*
