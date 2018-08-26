<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use App\Mail\ReportMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;

class GenerateReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the new users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the users that have less than a week of sign up.
     * @return mixed
     */
    public function handle()
    {
        // $weekAgo = Carbon::now()->subWeek();
        // $newUsers = User::where('created_at', '>=', $weekAgo)
        //     ->get(['email', 'name']);

        // if (!(new UserRepository)->newUsers()->isEmpty()) {
        if ((new UserRepository)->newUsers()) {
            Mail::to('luisclopez6@gmail.com')
                ->send(new ReportMail($newUsers));
                // ->queue();

            Log::info('Report generated succesfully...');
        }

        // echo $newUsers;
    }
}
