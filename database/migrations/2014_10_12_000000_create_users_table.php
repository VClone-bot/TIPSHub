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
            $table->id(); // Unique identifier
            $table->string('name'); // Name of the member
            $table->string('email')->unique(); // Email of the member, used to authenticate
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_office'); // TRUE if member of the office
            $table->boolean('is_teacher'); // TRUE is member is a teacher
            $table->boolean('is_admin');
            $table->boolean('is_active');
            $table->rememberToken();
            $table->timestamps();
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
