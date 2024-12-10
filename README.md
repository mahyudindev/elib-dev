
# Project Installation Guide

Welcome to the project! Follow these steps to set up the environment and get the project running on your local machine.

## Steps to Install and Run

1. **Clone the repository**  
   First, download Zip File or clone the repository to your local machine:
   ```bash
   git clone https://github.com/mahyudindev/laravel-elib
   cd laravel-elib
   ```
For Laragon Users
Copy to C:laragon



2. **Install Dependencies**  
   Inside the project directory, run the following command to install all necessary PHP packages:
   ```bash
   composer install
   ```

3. **Generate Application Key**  
   After installing dependencies, generate the application key by running:
   ```bash
   php artisan key:generate
   ```

4. **Setup Environment File**  
   Copy the example environment file and rename it to `.env`:
   ```bash
   cp .example.env .env
   ```

5. **Configure the Database**  
   Open the `.env` file and update the following variables to match your local database setup:
   ```env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Run Database Migrations**  
   Now, migrate the database to create the necessary tables:
   ```bash
   php artisan migrate --seed
   ```
8. **Runing tailwind **  
   :
   ```bash
   npm install && npm run dev
   ```

7. **Start the Development Server**  
   Finally, start the Laravel development server:
   ```bash
   php artisan serve
   ```

## You're all set!

You should now be able to access the application by visiting `http://localhost:8000` in your browser. Enjoy building!
