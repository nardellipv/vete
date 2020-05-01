<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->enum('sex', ['Macho', 'Hembra']);
            $table->string('race');
            $table->string('chip')->nullable();
            $table->string('fur')->nullable();
            $table->string('weight')->nullable();
            $table->string('name');
            $table->date('birthday');
            $table->enum('activity', ['Baja', 'Media', 'Alta'])->nullable();
            $table->enum('connivance',['Si', 'No'])->nullable();
            $table->enum('castrated', ['Si', 'No'])->nullable();
            $table->enum('nutrition', ['Balanceado', 'Natural', 'Ambas']);
            $table->enum('frequency', ['1', '2', '3', '4', '+4', 'Libre']);
            $table->mediumText('comment')->nullable();
            $table->string('slug');

            //relaciones

            $table->foreignId('specie_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreignId('customer_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreignId('veterinarian_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');


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
        Schema::dropIfExists('patients');
    }
}
