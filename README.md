# Laravel Auth and Admin Panel Package

The Laravel Auth and Admin Panel Package is a versatile Laravel package that offers basic authentication functionality along with a starter admin panel template. It streamlines the process of setting up user authentication and provides a foundation for building admin panels in your Laravel projects.

## Features

- User registration and login functionality.
- User authentication with customizable views.
- Admin panel starter template with responsive design.
- Built-in PWA ( Progressive Web App).

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
3. **Install PWA files**:

   ```bash  
   php artisan laravel-pwa:publish
   ``````


4. **Run Migrations**:
   Run the package migrations to create the necessary database tables:

   ```bash
    php artisan migrate
   ```

5. **Configure PWA**:
      Add following code in root blade file in header section.


      <!-- PWA  -->
      <meta name="theme-color" content="#6777ef"/>
      <link rel="apple-touch-icon" href="{{ asset('pwa.PNG') }}">
      <link rel="manifest" href="{{ asset('/pwa/manifest.json') }}">


      Add following code in root blade file in before close the body.


      <script src="{{ asset('/pwa/sw.js') }}"></script>
      <script>
         if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/pwa/sw.js").then(function (reg) {
                  console.log("Service worker has been registered for scope: " + reg.scope);
            });
         }
      </script>


6. Add the following routes in your web.php file:

   ``````
   Route::middleware(['auth'])->group(function(){

         Route::get('/dashboard',function(){
            return view('admin.dashboard');
         })->name('dashboard');
   });

   ``````


## Usage

### User Authentication

The package provides user authentication routes and views out of the box. You can customize the authentication views by modifying the published view files in your project's `resources/views` directory.

### Admin Panel

The admin panel starter template can be accessed by login in your browser. It includes a dashboard, user management pages, and a responsive design. You can customize and extend the admin panel to suit your project's needs.


## License

This package is open-source software licensed under the [MIT License](LICENSE).
