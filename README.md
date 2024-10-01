
 Crowdsourced Data System for COVID-19 Monitoring

A web application designed to monitor foot traffic at points of interest and manage potential contact with COVID-19 cases. This project provides users with an interactive map to report locations they visited while infected, notifying others who might have visited the same points of interest.

--> Features
- **Interactive Map:** Users can mark points of interest on a map where they were present while infected.
- **Real-time Alerts:** Notifies users who might have visited a marked location during the same timeframe.
- **COVID-19 Cases Diagram:** Displays a graphical representation of reported COVID-19 cases per day, allowing users to visualize trends and understand how the virus is spreading.
- **Crowdsourced Data:** Collects user-reported data to provide a comprehensive overview of potential COVID-19 exposure at various locations.

--> Technologies Used
- **Frontend:** 
  - HTML & CSS: For structuring and styling the interface.
  - jQuery: For interactive features and DOM manipulation.
- **Backend:**
  - PHP: For server-side processing and business logic.
  - SQL: For managing user data and exposure records.

--> Prerequisites
Before setting up the project, ensure you have the following installed:
- **XAMPP**: Includes Apache, PHP, and MySQL.

--> Setup Instructions

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/your-username/crowdsourced-covid-monitoring.git
   cd crowdsourced-covid-monitoring
   ```

2. **Set Up the Database:**
   - Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.
   - Create a new MySQL database named `covid_monitoring`.
   - Import the provided `database.sql` file to set up the required tables using **phpMyAdmin**:

   1. Go to `http://localhost/phpmyadmin`.
   2. Click on "Databases" and create a new database named `covid_monitoring`.
   3. Select the newly created database and click on "Import" to upload the `database.sql` file.

3. **Configure the Database Connection:**
   - Open the `config.php` file and set up your database credentials:

   ```php
   <?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root'); // Default username for XAMPP
   define('DB_PASSWORD', ''); // Default password for XAMPP
   define('DB_DATABASE', 'covid_monitoring');
   ?>
   ```

4. **Access the Application:**
   - Move the cloned project folder to the `htdocs` directory of your XAMPP installation (typically found at `C:\xampp\htdocs` on Windows).
   - Open your browser and go to `http://localhost/crowdsourced-covid-monitoring`.

--> Contributing
Feel free to submit issues or pull requests to help improve this project. If you have suggestions for new features, open a discussion or contact me directly.

--> License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

