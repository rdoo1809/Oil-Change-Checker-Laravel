<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Oil Change Checker

## Project Purpose

This is a simple Laravel 12 application that determines whether a car is due for an oil change based on odometer
readings and the date of the previous oil change.

A car is considered **due for an oil change** if **either** of the following conditions is true:

- It has traveled more than 5000 km since the last oil change.
- It has been more than 6 months since the last oil change.

---

## Features

- Submit car details via a simple web form:
    - Current odometer
    - Previous odometer
    - Date of previous oil change
- Backend validation for all inputs
- Automatic calculation of whether the car is due for an oil change
- Displays the result and submitted values on a dedicated result page
- “Check another car” link for repeated submissions
- Fully tested backend with PHPUnit feature tests

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
