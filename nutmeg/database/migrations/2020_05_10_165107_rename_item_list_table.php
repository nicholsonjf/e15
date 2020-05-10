<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameItemListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('item_list', 'item_shopping_list');
        Schema::table('item_shopping_list', function(Blueprint $table) {
            $table->dropForeign('item_list_list_id_foreign');
            $table->renameColumn('list_id', 'shopping_list_id');
            $table->foreign('shopping_list_id')->references('id')->on('shopping_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('item_shopping_list', 'item_list');
        Schema::table('item_list', function(Blueprint $table) {
            $table->dropForeign(['shopping_list_id']);
            $table->renameColumn('shopping_list_id ', 'list_id');

            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
        });
    }
}
