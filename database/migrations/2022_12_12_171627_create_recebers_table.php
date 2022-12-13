<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recebers', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('empresa')->nullable();
            $table->string('valor');
            $table->string('adicional')->nullable();
            $table->string('total');
            $table->longText('observacao')->nullable();
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
        Schema::dropIfExists('recebers');
    }
};
