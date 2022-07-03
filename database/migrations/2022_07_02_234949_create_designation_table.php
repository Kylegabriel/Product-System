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
        Schema::create('designation', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('designation');

        });

        DB::table('designation')
        ->insert([
          ['id' => '1', 'designation' => 'Whole Sale'],
          ['id' => '2', 'designation' => 'Ecommerce'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designation');
    }
};
