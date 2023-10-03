<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearUploads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploads:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up the user uploads';

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
        if ($this->confirm('Do you wish to continue?')) {
            Storage::deleteDirectory('documents');
            $this->info('Application uploads cleared!');
        } else {
            $this->error('Cancelled by user.');
        }
    }
}
