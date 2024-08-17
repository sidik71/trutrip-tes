# Travel Planner REST API with Laravel

This is a Laravel-based project that uses MySQL for database management, Swagger for API documentation, and PHPUnit for testing.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Setup](#environment-setup)
- [Database Setup](#database-setup)
- [Swagger API Documentation](#swagger-api-documentation)
- [Running Tests](#running-tests)

## Requirements

Make sure you have the following installed:

- PHP >= 8.1
- Composer
- MySQL
- Git (optional, for version control)

## Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/sidik71/trutrip-tes.git
   cd trutrip-tes
   ```
2. **Install Composer dependencies**:
   ```bash
   composer install
   ```

## Environment Setup

1. **Copy the .env.example file to .env**:

   ```bash
   cp .env.example .env
   ```

2. **Generate the application key**:

   ```bash
   php artisan key:generate
   ```

3. **Configure the .env file**:

    Open the .env file and update the following sections:
    - Database configuration:

   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
   ```

## Database Setup

1. **Create the database**:

    Log in to MySQL and run:

   ```bash
    CREATE DATABASE your_database_name;
   ```

2. **Run the migrations**:

   ```bash
    php artisan migrate
   ```

3. **(Optional) Seed the database**:

   ```bash
    php artisan db:seed
   ```

## Swagger

1. **Access the Swagger documentation**:

    After running the server (php artisan serve), visit:

   ```bash
    http://localhost:8000/api/documentation
   ```

## Running Tests
    
PHPUnit is used for automated testing.

1. **Run tests**:
   ```bash
    php artisan test
   ```

2. **Run specific test file**:
   ```bash
    php artisan test --filter=SpecificTest
   ```

3. **Generate coverage report (optional, requires Xdebug)**:
   ```bash
    php artisan test --coverage
   ```
   