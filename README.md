# Suppliers Management System 📦
A professional Technical Assessment project built with **Laravel 11** and **Tailwind CSS**.

## Features
* Supplier Registration & Management
* Search and Filter Functionality
* Professional Print View for Suppliers
* Responsive Design with Tailwind CSS

## Installation Guide (How to Clone)

Follow these steps to run the project locally:

1. **Clone the repository:**
   git clone [https://github.com/DulanjaleeWelikala/Suppliers-System.git](https://github.com/DulanjaleeWelikala/Suppliers-System.git)
   cd Suppliers-System

2. **Install PHP Dependencies:**
    composer install
   
3. **Install JavaScript Dependencies:** 
    npm install

4. **Setup Environment File:**
     cp .env.example .env
     php artisan key:generate

5. **Database Configuration:**
     Create a database named inbizsys_test in MySQL and run migrations:
      php artisan migrate 

6. **Run the Application:**
    php artisan serve
    npm run dev
