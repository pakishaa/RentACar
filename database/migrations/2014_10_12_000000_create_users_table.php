<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'users';
        if(Schema::hasTable($tableName)){
            return;
        }

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_admin')->default('1');
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('phone',255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        if(Schema::hasTable($tableName)){
            DB::statement('ALTER TABLE ' . $tableName . ' MODIFY `is_admin` TINYINT(1) NULL DEFAULT ("0") COMMENT "(1) admin_user, (0) client_user";');
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users');
    }
}
