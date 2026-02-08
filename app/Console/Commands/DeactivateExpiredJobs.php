<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Job;
use Carbon\Carbon;

class DeactivateExpiredJobs extends Command
{
    protected $signature = 'jobs:deactivate-expired';
    protected $description = 'Deactivate jobs after 30 days';

    public function handle()
    {
        Job::where('status', 'Active')
            ->where('created_at', '<=', Carbon::now()->subDays(30))
            ->update(['status' => 'Inactive']);

        $this->info('Expired jobs deactivated successfully.');
    }
}