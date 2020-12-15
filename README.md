## Project Setup

- create database
- `composer install`
- `cp .env.example .env`, then edit database connection accordingly
- `php artisan migrate`
- `php artisan serve`
- open browser at `http://localhost:8000`

## Routes
- `/tracer-study-submission` page for public users to submit response
- `/admin/tracer-studies` page for admin for managing responses by users
- `/admin/tracer-studies/download` download exported data to xlsx
