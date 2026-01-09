<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Oil Change Checker

## Project Purpose

This is a simple Laravel 12 application that determines whether a car is due for an oil change based on odometer
readings and the date of the previous oil change.

A car is considered **due for an oil change** if **either** of the following conditions is true:

- It has traveled more than 5000 km since the last oil change.
- It has been more than 6 months since the last oil change.

---

Check it out with the link below!
(may take ~1 minute to wake up)

https://oil-change-checker-laravel.onrender.com/

---

## Requirements

- PHP 8.2+
- Composer
- Laravel 12
- SQLite (included with PHP by default)
- No frontend build tools or JavaScript frameworks required

---

## Features

- **User Authentication**
    - Secure registration, login, and logout using Laravel Breeze
    - Only authenticated users can access the dashboard and manage data

- **Car Management**
    - Create and manage cars (make, model, year)
    - Each car belongs to a specific user
    - Users only see and interact with their own cars

- **Oil Change Checks**
    - Submit oil change checks for a selected car
    - Inputs include:
        - Current odometer
        - Odometer at previous oil change
        - Date of previous oil change
    - A check is considered **due** if:
        - More than 5,000 km have been driven **or**
        - More than 6 months have passed

- **History & Results**
    - View a read-only history of past oil change checks
    - Dedicated result page per submission
    - Data persists across refreshes

- **Clean Architecture**
    - Business logic extracted into a service class
    - Reusable Blade components for form inputs and errors
    - Model traits used for shared behavior (e.g. user ownership)

- **Validation & Security**
    - Centralized request validation via Form Requests
    - Authorization enforced via middleware
    - Relationships enforced at the database and model level

- **Testing**
    - Feature tests using PHPUnit
    - Tests cover validation, record creation, and user-scoped data access

---

## Setup and Run Instructions

1. **Clone the repository**

```bash
git clone <your-repo-url>
cd <repo-folder>
```

2. **Install Dependencies**

```bash
composer install
npm install
```

3. **Copy Environment File**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Run Migrations**

```bash
php artisan migrate
```

5. **Start the Development Server**

```bash
php artisan serve
```

---

## Testing Instructions

1. **Run Tests**

```bash
php artisan test
```
