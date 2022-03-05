<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentedCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'top_rented_cars';
        if(Schema::hasTable($tableName)){
            return;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('is_completed')->default(0);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE ' . $tableName . ' MODIFY `is_completed` TINYINT(1) NULL COMMENT "(0) issued, (1) finished";');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('rented_cars');
    }
}
