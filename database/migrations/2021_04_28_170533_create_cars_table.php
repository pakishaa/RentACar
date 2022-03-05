<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'top_cars';
        if(Schema::hasTable($tableName)){
            return;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark', 55);
            $table->string('model', 55);
            $table->string('year', 55);
            $table->string('fuel', 55);
            $table->string('ccm', 55);
            $table->string('power', 55);
            $table->string('transmission', 55);
            $table->integer('category_id')->unsigned();
            $table->string('price_per_day', 255);
            $table->string('description', 255)->nullable();
            $table->integer('is_rental')->default(0);
            $table->string('img')->nullable();
            $table->timestamps();
        });

        // Manually define indexes.
        Schema::table($tableName, function (Blueprint $table) {
            $table->index(['category_id'], 'category_index')->change();
        });

        DB::statement('ALTER TABLE ' . $tableName . ' MODIFY `is_rental` TINYINT(1) NULL  DEFAULT ("0") COMMENT "(0) active_cars, (1) rented_cars";');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cars');
    }
}
