
RISK MANAGEMENT SYSTEM SETUP GUIDE

1. Download the project zip file and extract its contents to your desired directory.
2. Open your terminal and navigate to the project directory.
3. Run composer install to install Laravel dependencies.
4. Generate a unique application key by executing php artisan key:generate.
5. Duplicate the .env.example file and rename the duplicate to .env.
6. Open the .env file and locate the DB_DATABASE parameter. Change its value to an existing database name (e.g., one set up in XAMPP).
7. Execute php artisan migrate:refresh --seed to migrate the database schema and seed it with initial data.
8. Install Node.js dependencies by running npm install.
9. Compile front-end assets using npm run dev.
10. Launch the application by accessing the link: http://127.0.0.1:8000 in your web browser.
11. Register an account on the system and log in with the created credentials.
12. Navigate to the Dashboard.
14. Utilize the CRUD functionality provided.


Additional Information:
-----------------------
The system utilizes two tables: riskowners and roles.
The user table is not used to avoid complexities related to password handling, as the focus is solely on basic CRUD operations.
