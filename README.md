
RISK MANAGEMENT SYSTEM SETUP GUIDE


1. Run composer install to install Laravel dependencies.
2. Duplicate the .env.example file and rename the duplicate to .env
3. Generate a unique application key by executing php artisan key:generate.
4. Open the .env file and locate the DB_DATABASE parameter. Change its value to an existing database name (e.g., one set up in XAMPP).
5. Execute php artisan migrate:refresh --seed to migrate the database schema and seed it with initial data.
6. Install Node.js dependencies by running npm install.
7. Compile front-end assets using npm run dev.
8. Launch the application by accessing the link: http://127.0.0.1:8000 in your web browser.
9. Register an account on the system and log in with the created credentials.
10. Navigate to the Dashboard.
11. Utilize the CRUD functionality provided.


Additional Information:
-----------------------
- The system utilizes two tables: riskowners and roles.
- The user table is not used to avoid complexities related to password handling, as the focus is solely on basic CRUD operations.
