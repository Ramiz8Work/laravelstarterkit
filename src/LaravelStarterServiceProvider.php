<?php

 namespace Ramiz\LaravelStarter;

 use Illuminate\Support\ServiceProvider;

 class LaravelStarterServiceProvider extends ServiceProvider
 {
    public function boot(){
         $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
         $this->loadViewsFrom(__DIR__.'/views', 'laravelstarter');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');

         $this->publishes([
               __DIR__.'/views' => resource_path('views'),
               __DIR__.'/database/migrations/' => database_path('migrations'),
               __DIR__.'/Public' => public_path('/'),
               __DIR__.'/Http/Controllers' => app_path('Http/Controllers'),
         ]);
    }   
    
    public function register()
    {
        
    }
 }