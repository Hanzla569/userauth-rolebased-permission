# User Authentication and Role-Based Permission Microservice

This is a Laravel-based microservice for managing user authentication and role-based permissions. It provides endpoints for user registration, login, and protected routes that require specific roles.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Migration](#database-migration)
- [Running the Application](#running-the-application)
- [API Endpoints](#api-endpoints)
  - [User Registration and Login](#user-registration-and-login)
  - [Protected Routes](#protected-routes)
- [Authentication](#authentication)
- [Role-Based Permissions](#role-based-permissions)
- [License](#license)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Hanzla569/userauth-rolebased-permission.git
   cd userauth-rolebased-permission

## Install dependencies:
composer install

## Copy the example environment file and configure the environment variables:
cp .env.example .env

## Generate the application key:
php artisan key:generate


## Configure the .env file:
Set your database connection details.
Set the APP_URL to http://example.com or your local development URL.

## Configuratoin
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=userauth
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=your_jwt_secret


## Generate a JWT secret key:

php artisan jwt:secret

## Database Migration
php artisan migrate

## Running the Application
php artisan serve

**Endpoints**

Authentication Endpoints
•	Register: POST /register
•	Login: POST /login
•	Logout: POST /logout (requires auth:api middleware)

**Product Endpoints**

•	Get All Products: GET /products (requires auth:api and role:admin,user,manager middleware)
•	Get Product by ID: GET /products/{id} (requires auth:api and role:admin,user,manager middleware)
•	Create Product: POST /products (requires auth:api and role:admin middleware)
•	Update Product: PUT /products/{id} (requires auth:api and role:admin middleware)
•	Delete Product: DELETE /products/{id} (requires auth:api and role:admin middleware)

**Authentication**

This microservice uses JWT (JSON Web Token) for authentication. All protected routes require a valid JWT token.
To authenticate, register or login to get an access token. Include this token in the Authorization header for all protected routes.

**Role-Based Permissions**
Roles are used to manage permissions for different users. Each user has a role, and certain routes may require specific roles.

Roles  include:

admin: Full access to all endpoints.
user/manager: Limited access to certain endpoints.only (register,login and get all products and a specific product)
