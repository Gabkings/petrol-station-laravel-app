<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Fuel_Cost
use App\Fuel_Types
use App\Pump_Sales
use App\Pumps
use App\Purchase_Order
use App\Sale_Period
use App\Staff 
use App\Staff_Assignment
use App\Supplier
use App\Supply
use App\Tank_Readings
use App\Tanks
use App\Units
use App\User 
class HashIdModelProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

      Fuel_Cost::created(function($model) {
        $generator = new Hashids(Fuel_Cost::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Fuel_Cost::where('url_string', $value)->first();
    });
      //////////////////////////////////////////////////////

      Fuel_Types::created(function($model) {
        $generator = new Hashids(Fuel_Types::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Fuel_Types::where('url_string', $value)->first();
    });
//////////////////////////////////////////////////////////////////////

      Pump_Sales::created(function($model) {
        $generator = new Hashids(Pump_Sales::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Pump_Sales::where('url_string', $value)->first();
    });
      //////////////////////////////////////////////////////////

        Pumps::created(function($model) {
        $generator = new Hashids(Pumps::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Pumps::where('url_string', $value)->first();
    });
      ////////////////////////////////////////////
        Purchase_Order::created(function($model) {
        $generator = new Hashids(Purchase_Order::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Purchase_Order::where('url_string', $value)->first();
    });
      /////////////////////////////////////////////////////

        Sale_Period::created(function($model) {
        $generator = new Hashids(Sale_Period::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Sale_Period::where('url_string', $value)->first();
    });
      //////////////////////////////////////////////////////////

        Staff::created(function($model) {
        $generator = new Hashids(Staff::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Staff::where('url_string', $value)->first();
    });
      //////////////////////////////////////////////////
        Staff_Assignment::created(function($model) {
        $generator = new Hashids(Staff_Assignment::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Staff_Assignment::where('url_string', $value)->first();
    });
      /////////////////////////////////////////////////////////

        Supplier::created(function($model) {
        $generator = new Hashids(Supplier::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Supplier::where('url_string', $value)->first();
    });

      ////////////////////////////////////////////////////////////////////

        Supply::created(function($model) {
        $generator = new Hashids(Supply::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Supply::where('url_string', $value)->first();
    });
      ////////////////////////////////////////////////////////////////////////

        Tank_Readings::created(function($model) {
        $generator = new Hashids(Tank_Readings::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Tank_Readings::where('url_string', $value)->first();
    });
      ///////////////////////////////////////////////////

        Tanks::created(function($model) {
        $generator = new Hashids(Tanks::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Tanks::where('url_string', $value)->first();
    });
      ////////////////////////////////////////////////////////

        Units::created(function($model) {
        $generator = new Hashids(Units::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return Units::where('url_string', $value)->first();
    });
      /////////////////////////////////////////////

              User::created(function($model) {
        $generator = new Hashids(User::class, 10);
        $model->url_string = $generator->encode($model->id);
        $model->save();
      });
      Route::bind('post', function ($value) {
          return User::where('url_string', $value)->first();
    });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
