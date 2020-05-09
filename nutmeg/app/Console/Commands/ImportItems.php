<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Item;

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
        $itemController = app()->make('App\Http\Controllers\ItemController');
        $items = $itemController->import($this->option('filename'));
        DB::beginTransaction();
        try {
            foreach ($items as $item_validated) {
                $item = new Item;
                $item->name = $item_validated['name'];
                $item->save();
            }
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        $output_message = "Successfully inserted " . strval(count($items)) . " items.";
        return $this->info($output_message);
    }
}
