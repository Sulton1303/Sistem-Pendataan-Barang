📦 Inventory Management System

🗂 Project Structure
1. index.php: The landing page for user login.
2. register.php: A registration form to create a new user account.
3. login.php: Processes the login credentials and authenticates users.
4. logout.php: Logs the user out and ends the session.
5. dashboard.php: The main interface where users can view inventory data after logging in.
6. db.php: Contains database connection settings.
7. assets/: A folder for styling and image assets used in the UI.

🔑 Features
1. 🧾 User Authentication:
   -Login
   -Register
   -Logout
2. 📊 Inventory Management:
   -Display stock items
   -Insert/Update/Delete item functionality

⚙️ Technologies Used
1. Frontend: HTML, CSS (in assets/)
2. Backend: PHP
3. Database: MySQL
4. Version Control: Git

🚀 How to Run the Project
1. Make sure you have XAMPP, LAMPP, or another PHP server installed.
2. Move the Sistem-Pendataan-Barang folder into your web server's htdocs directory.
3. Start Apache and MySQL via your control panel (e.g., XAMPP).
4. Create a MySQL database that matches the configuration in db.php.
5. Visit the application in your browser:
   http://localhost/Sistem-Pendataan-Barang/

⚠️ Notes
1. Configure the db.php file with your local database settings
   $conn = mysqli_connect("localhost", "root", "", "your_database_name");
2. Don’t forget to create the necessary tables for users and inventory data in your database before using the system.

📸 Screenshots
![image](https://github.com/user-attachments/assets/21181a8b-0ce7-438e-9532-bf4c6062aa91)
![image](https://github.com/user-attachments/assets/7689ddd8-ffac-4e55-9a21-ab476d17a114)
![image](https://github.com/user-attachments/assets/2638a41b-042f-49fe-ac90-5d452d8da57a)

👨‍💻 Muhammad Sulton , Informatics Student, University of Singaperbangsa Karawang


