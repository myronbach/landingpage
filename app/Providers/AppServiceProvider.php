<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /*метод listen описує ф-цію зв. виклику, що викликається при SQL запитах*/
       /* DB::listen(function($query){
            dump($query->sql);// виводить SQL при будь-якому запиті до БД
        });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
