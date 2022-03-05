<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'top_orders';
        if(Schema::hasTable($tableName)){
            return;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->timestamp('pickup_date');
            $table->timestamp('return_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('total_days', 255)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('is_confiramtion')->default(0);
            $table->timestamps();
        });

        // Manually define indexes.
        Schema::table($tableName, function (Blueprint $table) {
            $table->index(['car_id'], 'car_index')->change();
            $table->index(['user_id'], 'user_index')->change();
        });

        DB::statement('ALTER TABLE ' . $tableName . ' MODIFY `is_confiramtion` TINYINT(1) NULL COMMENT "(0) on_pending, (1) confirmed_order";');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('orders');
    }
}
