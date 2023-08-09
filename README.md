# Laravel Auth and Admin Panel Package

The Laravel Auth and Admin Panel Package is a versatile Laravel package that offers basic authentication functionality along with a starter admin panel template. It streamlines the process of setting up user authentication and provides a foundation for building admin panels in your Laravel projects.

## Features

- User registration and login functionality.
- User authentication with customizable views.
- Admin panel starter template with responsive design.
- Built-in user management features for administrators.

## Installation

To integrate the Laravel Auth and Admin Panel Package into your Laravel project, follow these steps:

1. **Install the Package**:
   Install the package via Composer:

   ```bash
   composer require ramiz/laravelstarterkit
   ```

2. **Publish Assets and Configuration**:
   Publish the package's assets:

   ```bash  
    php artisan vendor:publish --provider="Ramiz\Laravelstarter\LaravelStarterServiceProvider"
   ```

3. **Run Migrations**:
   Run the package migrations to create the necessary database tables:

   ```bash
    php artisan migrate
   ```




## Usage

### User Authentication

The package provides user authentication routes and views out of the box. You can customize the authentication views by modifying the published view files in your project's `resources/views` directory.

### Admin Panel

The admin panel starter template can be accessed by login in your browser. It includes a dashboard, user management pages, and a responsive design. You can customize and extend the admin panel to suit your project's needs.


## License

This package is open-source software licensed under the [MIT License](LICENSE).
