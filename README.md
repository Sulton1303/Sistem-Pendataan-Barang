📦 Inventory Management System

🗂 Project Structure
Sistem-Pendataan-Barang
/
│
├── index.php           # Login page
├── login.php           # User authentication logic
├── register.php        # User registration form
├── logout.php          # Logout handler
├── dashboard.php       # Main dashboard after login (displays inventory)
├── db.php              # Database connection settings
│
├── assets/
│   ├── style.css       # CSS styling
│   ├── stokbarang.jpg  # UI illustration image
│   └── stokbarang2.jpg

🔑 Features
1. 🧾 User Authentication:
   -Login
   -Register
   -Logout
2. 📊 Inventory Management:
   -Display stock items
   -Insert/Update/Delete item functionality

⚙️ Technologies Used
-Frontend: HTML, CSS (in assets/)
-Backend: PHP
-Database: MySQL
-Version Control: Git

🚀 How to Run the Project
1. Make sure you have XAMPP, LAMPP, or another PHP server installed.
2. Move the Sistem-Pendataan-Barang folder into your web server's htdocs directory.
3. Start Apache and MySQL via your control panel (e.g., XAMPP).
4. Create a MySQL database that matches the configuration in db.php.
5. Visit the application in your browser:
   http://localhost/Sistem-Pendataan-Barang/

⚠️ Notes
-Configure the db.php file with your local database settings
 $conn = mysqli_connect("localhost", "root", "", "your_database_name");
-Don’t forget to create the necessary tables for users and inventory data in your database before using the system.

📸 Screenshots
![image](https://github.com/user-attachments/assets/21181a8b-0ce7-438e-9532-bf4c6062aa91)
![image](https://github.com/user-attachments/assets/2638a41b-042f-49fe-ac90-5d452d8da57a)

👨‍💻 Developer
Muhammad Sulton
Informatics Student, University of Singaperbangsa Karawang


