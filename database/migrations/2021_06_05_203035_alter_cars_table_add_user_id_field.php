<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarsTableAddUserIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('top_cars') &&
            !Schema::hasColumn('top_cars','user_id')
        ) {
            Schema::table('top_cars', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->after('description')->nullable();
            });

            // Manually define indexes.
            Schema::table('top_cars', function (Blueprint $table) {
                $table->index(['user_id'], 'user_index')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
