<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:items {--filename=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bulk import items from a csv file';

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
     * @return mixed
     */
    public function handle()
    {
        $item = app()->make('App\Http\Controllers\ItemController');
        $items = $item->import($this->option('filename'));
        return $this->info($items);
    }
}
