<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\CreditCard;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('ccn', function($attribute, $value, $parameters, $validator) {
            return CreditCard::validCreditCard($value)['valid'];
        });

        Validator::extend('ccd', function($attribute, $value, $parameters, $validator) {
            try {
                $value = explode('/', $value);
                return CreditCard::validDate(strlen($value[1]) == 2 ? (2000+$value[1]) : $value[1], $value[0]);
            } catch(\Exception $e) {
                return false;
            }
        });

        Validator::extend('cvc', function($attribute, $value, $parameters, $validator) {
            return ctype_digit($value) && (strlen($value) == 3 || strlen($value) == 4);
        });
    }
}
