<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'top_invoices';
        if(Schema::hasTable($tableName)){
            return;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_price');
            $table->string('pickup_date', 50);
            $table->string('return_date', 50);
            $table->integer('car_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        // Manually define indexes.
        Schema::table($tableName, function (Blueprint $table) {
            $table->index(['car_id'], 'car_index')->change();
            $table->index(['user_id'], 'user_index')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('invoices');
    }
}
