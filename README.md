<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="pages/images/company-logo.png" alt="Logo" width="100" height="100">
  </a>
  <h3 align="center">C695: Employee Attendance Management System</h3>
  <p align="center">
    <a href="https://github.com/Dee-17/Employee-Attendance-Management">View Demo</a>
    ·
    <a href="https://github.com/Dee-17/Employee-Attendance-Management/issues">Report Bug</a>
    ·
    <a href="https://github.com/Dee-17/Employee-Attendance-Management/issues">Request Feature</a>
  </p>
</div>

<details>
  <summary><h2>Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
      </ul>
    </li>
    <li>
      <a href="#installation-guide">Installation Guide</a>
      <ul>
         <li><a href="#step-1-clone-repository-optional">Step 1: Clone Repository (Optional)</a></li>
         <li><a href="#step-2-download-repository-as-a-zip-file">Step 2: Download a Repository as a ZIP File</a></li>
         <li><a href="#step-3-run-the-website-locally-with-xampp">Step 3: Run the Website Locally with XAMPP</a></li>
      </ul>
    </li>
    <li><a href="#login-information">Login Information</a></li>
  </ol>
</details>


## About The Project
![Project Demo][project-screenshot]

The **Employee Attendance Management System (EAMS)** is a comprehensive solution designed to automate and simplify the process of tracking employee attendance. This system aims to ensure accurate record-keeping of employee working hours, thereby enhancing productivity and operational efficiency.

Here's how:
* EAMS is designed with a focus on the importance of time in organizations.
* Offers real-time insights into employee attendance for informed decision-making by managers.
* Capable of handling different time shifting schedules.
* EAMS minimizes the administrative workload linked to manual attendance tracking.
* Automation of the attendance tracking process reduces errors and enhances efficiency.

In essence, the **Employee Attendance Management System** is a vital tool for businesses seeking to optimize their workforce management, improve accountability, and boost overall performance. 

### Built With

* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* ![PHP][PHP.com]
* ![Javascript][Javascript.com]
* ![HTML][HTML.com]
* ![CSS][CSS.com]

<!-- GETTING STARTED -->

## Getting Started
Before proceeding to install the **Employee Attendance Management System (EAMS)** in your local computer, follow these steps first.

### Prerequisites
Before starting the installation process, ensure you have the following prerequisites:

1. **Operating System Compatibility:**
   - The project is compatible with Windows, macOS, or Linux.

2. **Internet Connection:**
   - A stable internet connection is required for downloading dependencies.

3. **GitHub Account (for Cloning):**
   - If you plan to clone the repository, you need a GitHub account. Create one [here](https://github.com/join).

4. **XAMPP Installation:**
   - XAMPP should be installed on your local machine. Download it [here](https://www.apachefriends.org/index.html).

5. **Web Browser:**
   - Ensure that your local computer can open a web server that supports PHP.


## Installation Guide
Follow these step-by-step instructions to set up the project on your local machine. The guide covers cloning the repository (or downloading as a ZIP file), running the website locally using XAMPP, and setting up the server with a database.

### Step 1: Clone Repository (Optional)
1. **Clone Repository:**
   - Open GitHub Desktop.
   - Click "File" > "Clone Repository."
   - Choose the repository or enter its URL.
   - Set the local path to the 'htdocs' folder inside the XAMPP directory (e.g., `C:\xampp\htdocs` on Windows).
   - Click "Clone."

### - OR -

### Step 2: Download Repository as a ZIP File

1. **Download the repository as a ZIP File:**
   - Click on the "Code" button, and from the dropdown menu, select "Download ZIP."
   - Save the ZIP file to your computer.

2. **Extract the ZIP File:**
   - Open the file explorer on your computer, locate the ZIP file, and extract its contents inside the XAMPP directory (e.g., `C:\xampp\htdocs` on Windows).

### Step 3: Run the Website Locally with XAMPP

1. **Open file manager and navigate to 'htdocs' folder:**
   - Open your file manager on your local computer.
   - Navigate to the 'htdocs' folder inside the XAMPP installation directory.

2. **Extract the downloaded files into 'htdocs':**
   - Right-click the downloaded ZIP file or copied folder.
   - Select the "Extract" or "Extract Here" option.
   - Alternatively, copy the downloaded files and paste them directly into the 'htdocs' folder.

3. **Start XAMPP services:**
   - Open the XAMPP Control Panel.
   - Start both Apache and MySQL services by clicking the "Start" button next to each.

4. **Open phpMyAdmin and import database:**
   - In a web browser, type `localhost/phpmyadmin/`.
   - Click on the "Import" tab and select the SQL file named `employee_db` from the extracted folder.
   - Click "Go" to import the database.

5. **Access the local website:**
   - Open your web browser and type `localhost/Employee-Attendance-Management/` in the address bar.


## Login Information
Use the following login information to navigate the system:

| Role                       | Username | Password    |
|----------------------------|----------|-------------|
| **Admin**                  | admin1   | admin123    |


| Employee Schedule          | Employee ID | Password    |
|----------------------------|-------------|-------------|
| **Part-Time (Afternoon)**  | 17          | password17  |
| **Part-Time (Morning)**    | 18          | password18  |
| **Full-Time (Day)**        | 14          | password14  |

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[PHP.com]: https://img.shields.io/badge/PHP-7A86B8?style=for-the-badge&logo=PHP&logoColor=white
[Javascript.com]: https://img.shields.io/badge/Javascript-EDD84B?style=for-the-badge&logo=Javascript&logoColor=white
[HTML.com]: https://img.shields.io/badge/HTML-E34B24?style=for-the-badge&logo=HTML&logoColor=white
[CSS.com]: https://img.shields.io/badge/CSS-1370B5?style=for-the-badge&logo=css&logoColor=white
[project-screenshot]: pages/images/installation-guide/demo.gif



