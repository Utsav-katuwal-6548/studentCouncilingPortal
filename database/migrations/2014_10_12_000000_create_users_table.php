<?php

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
        Schema::create('users', function (Blueprint $table) {
           $table->string('user_id');
           $table->string('integration_id')->nullable();
           $table->integer('authentication_provider_id')->nullable();
           $table->string('login_id')->nullable();
           $table->string('password')->nullable();
           $table->string('first_name')->nullable();
           $table->string('last_name')->nullable();
           $table->string('full_name')->nullable();
           $table->string('sortable_name')->nullable();
           $table->string('short_name')->nullable();
           $table->string('email')->nullable();
           $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
