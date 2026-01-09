# Legendary Motors

## Server Side Programming Assignment - Laravel 12

### Overview
This project is a high-end luxury car dealership application built with Laravel 12. It features a custom "Brabus" themed UI, Admin & User Dashboards, and full e-commerce functionality for reserving vehicles.

### Features (Rubric Compliance)
- **Framework**: Laravel 12.x
- **Database**: 100% Eloquent ORM usage (No raw SQL).
- **Authentication**: Laravel Jetstream (Fortify) & Sanctum (API).
- **Frontend**: Blade + Livewire Components (Car Configurator, Favorites).
- **Security**:
  - Hashed Passwords (Bcrypt).
  - CSRF Protection on all forms.
  - Role-Based Access Control (Admin vs User).

### Installation (Local)
1. Clone the repository.
2. Run `composer install` & `npm install`.
3. Copy `.env.example` to `.env` and configure your database.
4. Run `php artisan key:generate`.
5. Run `php artisan migrate --seed`.
6. Serve with `php artisan serve`.

### Deployment (Heroku/Railway)
This project includes a `Procfile` for seamless deployment.
1. **Push to GitHub**.
2. **Connect to Railway/Heroku**.
3. **Set Environment Variables**:
   - `APP_KEY`
   - `DB_CONNECTION`, `DB_HOST`, etc.
   - `STRIPE_SECRET` (if payments enabled).
4. **Deploy**: The system will automatically detect the `Procfile` and launch.

---
*Submitted by Nethan K.*
