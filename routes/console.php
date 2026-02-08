<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


/*
|--------------------------------------------------------------------------
| Job Auto Deactivation (After 30 Days)
|--------------------------------------------------------------------------
*/

// Daily check: 30 din purani jobs ko Inactive kar dega
Schedule::command('jobs:deactivate-expired')->daily();