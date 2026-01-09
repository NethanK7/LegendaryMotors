# Security Strategy Documentation

## Overview
This document outlines the security measures implemented in the **Legendary Motors** application, ensuring compliance with industry standards and the university assignment rubric.

## 1. Authentication & Session Management
- **Framework**: We use **Laravel Jetstream** (powered by Fortify) to handle all authentication logic.
- **Password Hashing**: All user passwords are automatically hashed using **Bcrypt** (via Laravel's default `Hash` facade) before storage. No plain-text passwords are ever stored.
- **Session Security**: Sessions are protected with secure, HTTP-only cookies to prevent XSS attacks.

## 2. API Security
- **Authentication**: Usage of **Laravel Sanctum** provides stateful authentication for our SPA frontend and token-based authentication for external API access.
- **Middleware**: The `auth:sanctum` middleware protects sensitive endpoints (e.g., `/api/user`), ensuring only authenticated requests are processed.

## 3. Data Protection & Input Sanitization
- **SQL Injection Prevention**: We exclusively use **Eloquent ORM** for database interactions. Eloquent automatically binds parameters, preventing SQL injection vulnerabilities. Raw SQL queries are avoided.
- **Cross-Site Request Forgery (CSRF)**: All POST/PUT/DELETE forms include the `@csrf` directive. Laravel's middleware automatically verifies the token for every state-changing request.
- **Input Validation**: All incoming requests (Registration, Login, Car Creation) are validated using Laravel's `validate()` method or Form Requests, ensuring strict data integrity.

## 4. Authorization
- **Role-Based Access Control (RBAC)**: Custom middleware (`AdminMiddleware`) restricts administrative routes (Dashboard, Inventory Management) to users with the `is_admin` flag.
- **Policy Enforcement**: Frontend interfaces (views) conditionally render elements based on user roles (e.g., Admins see "View Details" instead of "Configure").

## 5. Deployment Security (Planned)
- **HTTPS**: The application will be deployed on a platform enforcing SSL/HTTPS (e.g., Railway/Heroku).
- **Environment Variables**: Sensitive credentials (DB passwords, Stripe Keys) are stored in `.env` and never committed to version control.
