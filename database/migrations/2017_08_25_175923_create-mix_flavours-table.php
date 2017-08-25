<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixFlavoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_flavours', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mix_id');
            $table->unsignedInteger('flavour_id');
            $table->unsignedTinyInteger('units')->default(1);
            $table->float('nicotine', 2, 2)->default(0);
            $table->timestamps();

            $table->unique(['mix_id', 'flavour_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mix_flavours');
    }
}
