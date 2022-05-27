# Student Registration Website with Laravel and Vue

> Laravel 9.14.1 API that uses the API resources. Vue 3 for the frontend development.

## Quick Start

```bash

# Install Dependencies
composer install
npm install

# Create .env file just like .env.example and configure as you want such as DB_DATABASE

# Create a database with the same as DA_DATABASE

# Run Migrations
php artisan migrate

# Import Courses
php artisan db:seed

# Add virtual host if using Apache

# If you get an error about an encryption key
php artisan key:generate

# Run your development server
php artisan serve

```

## Endpoints

### List all students with general information and enrolled courses

```bash
GET api/students
```

### Create student

```bash
POST api/student/store
```

## App Info

### Author

Yin Lynn Htun


### Version

1.0.0

### License

This project is licensed under the MIT License
