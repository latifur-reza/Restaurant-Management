<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use View;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Fetch the Site Settings object
        $settings = AppSettings::orderBy('created_at','asc')->get();
        View::share('settings', $settings);
    }
}
