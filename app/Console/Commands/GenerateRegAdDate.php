<?php

namespace App\Console\Commands;

use App\Suchi;
use Illuminate\Console\Command;

class GenerateRegAdDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'regad:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the reg_date_ad of registered Suchis';

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
        $suchis = Suchi::registeredOnly()->whereNull('reg_date_ad')->get();

        foreach($suchis as $suchi) {
            $suchi->update([
                'reg_date_ad' => bs_to_ad($suchi->reg_date)
            ]);
        }

        $this->info('Generated successfully.');
    }
}
