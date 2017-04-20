<?php

namespace Yuxiaoyang\YfbpcPay;

use Illuminate\Support\ServiceProvider;

class YfbpcPayProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('yfbpcpay',function(){
            return new YfbpcPay();
        });//app('yfbpcpay')
    }
}
