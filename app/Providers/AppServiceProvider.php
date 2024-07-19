<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SystemInfo;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    
        $app_name = SystemInfo::where('meta_name', 'app_name')->first()->meta_value;
        $app_version = SystemInfo::where('meta_name', 'app_version')->first()->meta_value;
        $app_logo = SystemInfo::where('meta_name', 'app_logo')->first()->meta_value;
        $customer_care_no1 = SystemInfo::where('meta_name', 'customer_care_no1')->first()->meta_value;
        $customer_care_no2 = SystemInfo::where('meta_name', 'customer_care_no2')->first()->meta_value;
        $store_contact_info = SystemInfo::where('meta_name', 'store_contact_info')->first()->meta_value;

        $data = [
            'app_name' =>  "$app_name",
            'app_version' => "$app_version",
            'app_logo' => "$app_logo",
            'customer_care_no1' => "$customer_care_no1",
            'customer_care_no2' => "$customer_care_no2",
            'store_contact_info' => "$store_contact_info"
        ];
        //ClassName::method(aa1,aa2);
        View::share('appData', $data);
    }
}