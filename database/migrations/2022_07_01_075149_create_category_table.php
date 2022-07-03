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
        Schema::create('category', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->char('supplier_code',2);
          $table->char('category_code',4);
          $table->string('category_name');

          $table->primary('category_code');
          $table->foreign('supplier_code')->references('supplier_code')->on('supplier');
        });

        DB::table('category')
        ->insert([
            ['supplier_code' => '01', 'category_code' => '0111', 'category_name' => 'Computer Specs'],
            ['supplier_code' => '01', 'category_code' => '0112', 'category_name' => 'Laptops'],

            ['supplier_code' => '02', 'category_code' => '0222', 'category_name' => 'Cat Food'],
            ['supplier_code' => '02', 'category_code' => '0223', 'category_name' => 'Rabbit Food'],
            ['supplier_code' => '03', 'category_code' => '0333', 'category_name' => 'Shoes'],
            ['supplier_code' => '03', 'category_code' => '0334', 'category_name' => 'Sandals'],
            ['supplier_code' => '04', 'category_code' => '0444', 'category_name' => 'Tshirt'],
            ['supplier_code' => '04', 'category_code' => '0445', 'category_name' => 'Sando'],
            ['supplier_code' => '05', 'category_code' => '0555', 'category_name' => 'Watches'],
            ['supplier_code' => '05', 'category_code' => '0556', 'category_name' => 'Mobiles'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function($table) {
          $table->dropForeign('category_supplier_code_foreign');
        });

        Schema::drop('category');
    }
};
