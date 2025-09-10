# Medium Clinic Management System 🩺

## Overview

The **Medium Clinic Management System (MCMS)** is a web-based application designed to modernize and streamline clinic operations, replacing inefficient paper-based processes with a secure, digital platform. MCMS enhances the management of patient records, appointments, medical histories, and interactions among various stakeholders in a medium-sized clinic. The system supports role-based access control, ensuring secure and efficient workflows for all users.

Built with modern web technologies, MCMS addresses critical challenges in manual clinic management, including data redundancy, delayed information retrieval, inaccuracies, and security vulnerabilities.

## Technologies Used 🛠️

- **Backend**: PHP (server-side logic and database interactions)
- **Frontend**: Bootstrap (responsive UI design), jQuery (dynamic client-side scripting)
- **Database**: MySQL (storage for user data, patient records, and system logs)
- **Other**: HTML5, CSS3 (integrated with Bootstrap for styling)

## User Roles and Features ✅

MCMS defines distinct roles for various actors, each with tailored functionalities to support clinic workflows.

### 1. Admin
The Admin has full control over the system to ensure smooth operations and data integrity.
- Add, update (including account types), and delete users.
- Activate and deactivate user accounts.
- View user account status reports and session logs.
- Manage all actors (add, edit, delete).
- Backup and restore the database.
- Manage system settings (addresses, headers, footers, news updates).
- Handle user feedback.
- Generate comprehensive clinic reports.

### 2. Clerk
The Clerk manages patient registration and administrative tasks related to appointments and doctors.
- Register and update patient information.
- Assign patients to available doctors (automated based on doctor availability).
- View appointment history.
- Manage doctor information and specializations.

### 3. Lab Technician
The Lab Technician processes laboratory requests and delivers results digitally.
- View lab requests.
- Perform tests and generate results.
- Upload and send lab results through the system.

### 4. Radiologist
The Radiologist handles imaging requests and produces diagnostic reports.
- View requests for ECG, X-ray, and Ultrasound.
- Perform imaging tests and generate results.
- Upload and send radiology reports through the system.

### 5. Pharmacist
The Pharmacist manages prescriptions and medication dispensing.
- Receive prescriptions from doctors via the system.
- Add and manage medication administration records for patients.

### 6. Doctor
The Doctor accesses patient records and manages medical consultations.
- View patient medical records (medications, laboratory reports, radiology reports).
- Review assigned patients.
- Add medical history entries.
- Create medication prescription forms.
- Request and receive diagnostic laboratory and radiography results.
- Approve or reject patient appointments.

### 7. Patient
Patients use self-service features to manage their care.
- Book appointments online.
- Check appointment status.
- View medical reports and medication details (dosage instructions: how, when, and frequency).

## Problem Statement 📋

The National Medium Clinic faces significant challenges with its current paper-based system. As patient numbers increase, manual processes are becoming inefficient, requiring excessive manpower and resources. Key issues include:

- **Redundancy of Information**: Duplicated data across multiple locations leads to inconsistencies and management challenges.
- **Delayed Information Storage**: Storing information in real-time is difficult due to manual organization.
- **Slow Information Retrieval**: Retrieving records, such as patient forms, requires extensive manual searching, wasting time for patients and staff.
- **Lack of Accuracy**: Human errors in calculations and data entry result in inaccurate records and reports.
- **Security Vulnerabilities**: Physical files stored in cabinets are prone to theft, loss, or environmental damage, with limited access controls.

MCMS resolves these issues by providing a centralized, secure, and automated platform that enhances data accuracy, accessibility, and security.

## Screenshots 📸

Below are screenshots that showcase the key features of the Medium Clinic Management System. These demonstrate the user-friendly interface and core functionalities.

- **Admin Dashboard**: Overview of the system.
- <img width="2135" height="1174" alt="Screenshot 2025-09-10 072104" src="https://github.com/user-attachments/assets/f3a40215-e67f-4460-bfd8-4fdfb06110c5" />

- **Clerk Dashboard**: 
<img width="2135" height="1174" alt="Screenshot 2025-09-10 073044" src="https://github.com/user-attachments/assets/0e8b4e51-d1a3-4d70-9000-db97136d3581" />
  
- **Patient Dashboard**: Interface for viewing medical histories and reports for patients.  
<img width="2159" height="1135" alt="Screenshot 2025-09-10 084816" src="https://github.com/user-attachments/assets/3d61a148-904e-45d3-9310-816428f035e4" />

## Installation and Setup ⚙️

### Prerequisites
- Web server (e.g., Apache) with PHP support.
- MySQL database server.
- Modern web browser (e.g., Chrome, Firefox) for frontend access.

### Steps
1. Clone or download the project repository.
2. Import the provided SQL schema into MySQL to set up the database.
3. Configure database connection settings in the PHP configuration file (e.g., `config.php`).
4. Deploy the application on the web server.
5. Access the system via a web browser and log in with admin credentials to initialize users.

## Usage 🖥️

- **Login**: Users access the system through a secure login page with role-based dashboards.
- **Navigation**: The interface, built with Bootstrap, is responsive and user-friendly across devices.
- **Security**: Features session management, input validation, and encryption for sensitive data.
- **Reports and Logs**: Admins can generate clinic reports and monitor user activity logs for auditing.

For detailed code structure, refer to the source files in the repository. Contributions and feedback are welcome to enhance the system.

## License 📜

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file in the project root for full details.

### Third-Party Dependencies
The following third-party libraries are used in MCMS, each licensed under the MIT License:
- **Bootstrap**: [MIT License](https://github.com/twbs/bootstrap/blob/main/LICENSE)
- **jQuery**: [MIT License](https://jquery.org/license/)

Note: The MySQL database server, if distributed, is subject to the GNU General Public License v2.0 (GPLv2). Ensure compliance with its terms if applicable.


## Contributing 🤝

Contributions are welcome! Please submit pull requests or issues via the project repository. Ensure all contributions comply with the MIT License.
