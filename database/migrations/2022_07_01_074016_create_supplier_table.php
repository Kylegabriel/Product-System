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
        Schema::create('supplier', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->char('supplier_code',2);
            $table->string('supplier_name');

            $table->primary('supplier_code');
        });

        DB::table('supplier')
        ->insert([
          ['supplier_code' => '01','supplier_name' => 'Fairfield Processing'],
          ['supplier_code' => '02','supplier_name' => 'Cold Steel'],
          ['supplier_code' => '03','supplier_name' => 'Taffy Town'],
          ['supplier_code' => '04','supplier_name' => 'Ohio Stoneware'],
          ['supplier_code' => '05','supplier_name' => 'VSI'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier');
    }
};
