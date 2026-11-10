# CampusKart 2.0 — API

A RESTful backend for **CampusKart 2.0**, a campus marketplace designed to connect students who want to buy and sell products within their university communities.

Built with Laravel, this API is maintained separately from the Vue.js frontend to keep the application's backend logic and user interface independent.

## Project Overview

CampusKart 2.0 aims to provide students with a platform to discover products, create listings, manage their accounts, and interact with a marketplace tailored to campus communities.

The Laravel API will handle data persistence, authentication, authorization, validation, and marketplace business logic. The Vue frontend will consume the API over HTTP.

## Tech Stack

- **Laravel 12** — Backend framework
- **PHP** — Backend programming language
- **MySQL** — Relational database
- **Laravel Sanctum** — Authentication support
- **Spatie Laravel Permission** — Role and permission management
- **Laravel Migrations** — Database schema management
- **PHPUnit / Laravel Testing** — Automated testing
- **Composer** — PHP dependency management

## Architecture

CampusKart 2.0 uses a separated frontend and backend architecture:

- **Frontend:** Vue 3 with JavaScript
- **Backend:** Laravel REST API
- **Database:** MySQL
- **Communication:** HTTP requests between the frontend and backend

The backend is responsible for enforcing validation, authentication, authorization, and business rules rather than relying on frontend checks alone.

## Getting Started

### Prerequisites

Make sure you have installed:

- PHP 8.2 or a compatible version supported by the project
- Composer
- MySQL
- Git

### 1. Clone the repository

```bash
git clone git@github.com:mohammedjodi/CampusKart2.0-API.git
cd CampusKart2.0-API
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure environment variables

Create your local environment file:

```bash
cp .env.example .env
```

Update the database settings in `.env` to match your local MySQL configuration.

Generate an application key if one has not already been generated:

```bash
php artisan key:generate
```
### 4. Run database migrations

```bash
php artisan migrate
```

### 5. Start the development server

```bash
php artisan serve
```

### 6. Run automated tests

```bash
php artisan test
```

## Authentication and Authorization

Authentication and authorization are foundational parts of the project.

The project includes Laravel Sanctum for authentication support and Spatie Laravel Permission for role and permission management.

The authentication flow, API protection, role assignments, and authorization policies will be implemented and tested as the application develops.

The intended design is to keep sensitive operations protected by backend authorization checks.

## Development Roadmap

- [x] Initialize the Laravel project
- [x] Configure database connectivity
- [x] Run initial database migrations
- [x] Install Laravel Sanctum
- [x] Install Spatie Laravel Permission
- [x] Verify the initial automated tests
- [X] Design and implement the database schema
- [x] Define Models and Add Model Relationships
- [x] Add Default Seeders to DB
- [x] Configure Sanctum For Authentication and CORS 
- [ ] Define API routes and resource controllers
- [ ] Implement registration and login
- [ ] Configure authentication and authorization middleware
- [ ] Implement user profiles and account management
- [ ] Build product and category endpoints
- [ ] Implement listing creation, updates, and status management
- [ ] Add image upload handling
- [ ] Expand automated feature and authorization tests
- [ ] Configure production deployment

## Testing

Automated tests will be used to verify API behavior, request validation, authentication, authorization, and important marketplace workflows.

Run the test suite with:

```bash
php artisan test
```

## Project Goal

The goal is to build a secure, maintainable, and production-minded API that supports the CampusKart marketplace while remaining independent of the frontend implementation.

Development will emphasize clear separation of responsibilities, reliable validation, appropriate access control, automated testing, and maintainable code.

## Author

**Mohammed Jodi**

GitHub: @mohammedjodi
