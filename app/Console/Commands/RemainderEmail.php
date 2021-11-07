<?php

namespace App\Console\Commands;

use App\Mail\RemianderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Ad;
class RemainderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'a daily email at 08:00 PM that will be sent to advertisers who have ads the next day as a remainder';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ads = Ad::where('start_date',\Carbon\Carbon::tomorrow())->get();
        foreach ($ads as $ad){
          Mail::to($ad->advertiser->email)->send(new RemianderEmail($ad));
        }

    }
}
