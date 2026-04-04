
# Hospital-management-system

# Cell Oasis - Hospital Management System

 A comprehensive Hospital Management System built with PHP and MySQL for M.Sc. Computer Science project at University of East London (December 2024)



## 📋 Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Database](#database)
- [Screenshots](#screenshots)
- [Future Enhancements](#future-enhancements)
- [License](#license)
- [Contributors](#contributors)
- [Acknowledgments](#acknowledgments)



## 🎯 About the Project

Cell Oasis is a full-featured Hospital Management System that provides separate portals for three user roles:

- **Patients** can book appointments, view prescriptions, and manage their profiles
- **Doctors** can manage appointments, create prescriptions, and maintain treatment records
- **Administrators** have full control over the entire system

This project was developed as a part of M.Sc. Computer Science curriculum in December 2024.



## ✨ Features

### 👤 Patient Portal
- User registration and login
- Online appointment booking
- View appointment status (Pending/Approved/Rejected)
- Prescription history
- Profile management
- Password recovery

### 👨‍⚕️ Doctor Portal
- Self-registration for doctors
- Login authentication
- View and manage appointments
- Approve/reject patient appointments
- Create prescriptions
- Treatment records management
- Profile and availability management

### ⚙️ Admin Panel
- Dashboard with statistics
- Department management
- Doctor management
- Patient management
- Appointment management
- Medicine inventory
- Treatment records
- View patient feedback
- Reports generation

### 🌐 Public Features
- Home page with hospital information
- About Us page
- Contact Us form
- Department information
- Doctor profiles



## 🛠 Tech Stack

| Category | Technology |
|----------|------------|
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap 4 |
| **Backend** | PHP 8.x |
| **Database** | MySQL (phpMyAdmin) |
| **Server** | Apache (XAMPP/WAMP) |
| **Email** | PHPMailer |



## 📦 Installation

### Prerequisites
- XAMPP (or WAMP/LAMP) installed
- Web browser (Chrome, Firefox, Edge)
- Code editor (VS Code, Sublime Text)

### Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/cell-oasis-hospital.git
   ```

2. **Setup Database**
   - Open phpMyAdmin (`http://localhost/phpmyadmin`)
   - Create a new database named `hospital`
   - Import the SQL file from `db/` folder

3. **Configure Project**
   - Copy project to `htdocs/hospital` (XAMPP) or `www/hospital` (WAMP)
   - Update database credentials in `dbconnection.php` if needed

4. **Run the Application**
   - Start Apache and MySQL in XAMPP
   - Open browser and navigate to `http://localhost/hospital/`



## 🚀 Usage

### Default Login Credentials

| Role | URL | Username | Password |
|------|-----|----------|----------|
| **Admin** | `/admin/adminlogin.php` | admin | admin123 |
| **Doctor** | `/doctor/doctorlogin.php` | (Register new) | (Register new) |
| **Patient** | `/patient/patientlogin.php` | (Register new) | (Register new) |



## 📂 Project Structure

```
hospital/
├── admin/                  # Admin panel
│   ├── adminlogin.php
│   ├── adminaccount.php
│   ├── doctor.php
│   ├── patient.php
│   ├── appointment.php
│   ├── department.php
│   ├── medicine.php
│   ├── treatment.php
│   └── view*.php          # View pages
│
├── doctor/                 # Doctor panel
│   ├── doctorlogin.php
│   ├── doctoraccount.php
│   ├── doc_reg.php
│   ├── prescription.php
│   ├── viewappointment.php
│   └── treatment*.php
│
├── patient/                # Patient panel
│   ├── patientlogin.php
│   ├── patientaccount.php
│   ├── patientappointment.php
│   ├── prescription*.php
│   └── patient.php
│
├── assets/                # CSS, images, JS
├── layout/                # Layout styles
├── db/                    # Database files
├── phpmail/               # Email functionality
├── index.php              # Home page
├── aboutus.php
├── contactus.php
└── dbconnection.php       # Database connection
```



## 🗃 Database

### Key Tables
- `admin` - Administrator accounts
- `doctor` - Doctor profiles
- `patient` - Patient records
- `appointment` - Appointment bookings
- `prescription` - Doctor prescriptions
- `department` - Hospital departments
- `medicine` - Medicine inventory
- `treatment` - Treatment records



## 📸 Screenshots

> Add your project screenshots here

| Home Page | Admin Dashboard | Patient Login | Doctor Login | 
|-----------|----------------|---------------|---------------|
| ![Home](assets/images/screenshot1.png) | ![Admin](assets/images/screenshot2.png) | ![Login](assets/images/screenshot3.png) | ![Login](assets/images/screenshot4.png) |



## 🔮 Future Enhancements

- [ ] SMS notification integration
- [ ] Email notifications for appointments
- [ ] Online payment gateway
- [ ] Video consultation feature
- [ ] Mobile application (Android/iOS)
- [ ] Lab report management
- [ ] Inventory management system
- [ ] Advanced billing system
- [ ] AI-based symptom checker



## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.



## 👥 Contributors

| Detail |
|--------|
| Group Project - M.Sc. Computer Science, University of East London |



## 🙏 Acknowledgments

- University of East London - Faculty and Project Guide
- Open source community for PHP, Bootstrap, and other libraries

---

<p align="center">
  Made with ❤️ by Team Cell Oasis
</p>

<p align="center">
  <sub>M.Sc. Computer Science - University of East London - December 2024</sub>
</p>

