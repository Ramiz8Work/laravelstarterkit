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


3. **Run Migrations**:
   Run the package migrations to create the necessary database tables:

   ```bash
    php artisan migrate
   ```

4. **Install PWA files**:

   ```bash  
   php artisan laravel-pwa:publish
   ``````

5. **Configure PWA**:
      Add following code in root blade file in header section.

      ```````
      <!-- PWA  -->
      <meta name="theme-color" content="#6777ef"/>
      <link rel="apple-touch-icon" href="{{ asset('pwa.PNG') }}">
      <link rel="manifest" href="{{ asset('/pwa/manifest.json') }}">
      ```````


      Add following code in root blade file in before close the body.

      ```````
      <script src="{{ asset('/pwa/sw.js') }}"></script>
      <script>
         if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/pwa/sw.js").then(function (reg) {
                  console.log("Service worker has been registered for scope: " + reg.scope);
            });
         }
      </script>
      ```````
   
   Update public/pwa/manifest.stub file for basic pwa settings.

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

### Progressive Web App (PWA)

A Progressive Web App (PWA) is a modern web application that combines the best of both web and mobile app experiences. PWAs are designed to work seamlessly across various devices and platforms, providing users with fast loading times, offline access, and an engaging, app-like interface. By leveraging service workers and web app manifests, PWAs deliver enhanced performance, reliable functionality, and the ability to be added to the user's home screen. Embrace the future of web development by incorporating PWA features into your web application.

To use and install a Progressive Web App (PWA), users can typically follow these steps:

1. **Accessing the PWA:**
   Users can access the PWA just like any other website by entering its URL in a web browser's address bar. The PWA will load and function like a regular website.

2. **Install PWA on Desktop:**
   On modern desktop browsers that support PWAs (such as Google Chrome, Microsoft Edge, and Firefox), users may see an install prompt in the address bar. This prompt usually looks like a "+" or "Install" button. Clicking this button allows users to install the PWA on their desktop. Once installed, the PWA may create a shortcut on the desktop or in the applications menu for easy access.

3. **Install PWA on Mobile:**
   On compatible mobile browsers (such as Chrome for Android), users may see an install prompt, similar to the desktop experience. Tapping this prompt allows users to add the PWA to their home screen, creating an app-like icon for quick access.

4. **Using the Installed PWA:**
   After installation, the PWA can be launched directly from the home screen (mobile) or applications menu (desktop). Users can enjoy a fast, app-like experience with offline access, push notifications, and other PWA features.

5. **Uninstallation:**
   Users can uninstall a PWA just like any other app. On desktop, they can remove it from their applications or programs. On mobile, they can delete it from their home screen or app drawer.

It's important to note that not all browsers or devices support all PWA features. While most modern browsers offer PWA support, users might have slightly different experiences based on their browser and operating system. As a developer, you can enhance the installation experience by providing a manifest file (`manifest.json`) with appropriate metadata and icons, as well as implementing a service worker for offline functionality.


## License

This package is open-source software licensed under the [MIT License](LICENSE).
