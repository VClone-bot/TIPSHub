<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Unique identifier
            $table->string('name'); // Name of the member
            $table->date('date');
            $table->time('heure');
            $table->string('lieu');
            $table->string('type');
            $table->string('facebook_link');
            $table->string('visual_url');
            $table->string('description');
            $table->boolean('archived');
            $table->boolean('published');
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