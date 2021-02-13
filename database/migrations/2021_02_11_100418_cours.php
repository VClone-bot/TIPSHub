<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('nom_du_cours');
            $table->date('date');
            $table->time('heure');
            $table->boolean('presentiel');
            $table->string('lien_visio');
            $table->string('mot_de_passe_visio');
            $table->string('lieu');
            $table->string('numero_cours');
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
        //
    }
}
