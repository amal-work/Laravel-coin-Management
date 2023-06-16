<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class IncreaseUserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usercount:increase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $count = DB::table('test')->increment('count');        
        $this->info("User count increased to {$count}");
        //return 0;
    }
}
