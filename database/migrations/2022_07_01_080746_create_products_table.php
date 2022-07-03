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
        Schema::create('products', function (Blueprint $table) {
          $table->engine = 'InnoDB';

          $table->char('supplier_code',2);
          $table->char('category_code',4);
          $table->char('product_code',6);
          $table->string('product_name');

          $table->primary('product_code');
          $table->foreign('supplier_code')->references('supplier_code')->on('supplier');
          $table->foreign('category_code')->references('category_code')->on('category');
        });

        DB::table('products')
        ->insert([
        ['supplier_code' => '01', 'category_code' => '0111', 'product_code' => '011111', 'product_name' => 'Dell'],
        ['supplier_code' => '01', 'category_code' => '0112', 'product_code' => '011112', 'product_name' => 'Sony'],
        ['supplier_code' => '02', 'category_code' => '0222', 'product_code' => '022222', 'product_name' => 'Cat'],
        ['supplier_code' => '02', 'category_code' => '0223', 'product_code' => '022223', 'product_name' => 'Rabbit'],
        ['supplier_code' => '03', 'category_code' => '0333', 'product_code' => '033333', 'product_name' => 'Port & Company'],
        ['supplier_code' => '03', 'category_code' => '0334', 'product_code' => '033334', 'product_name' => 'Apparel'],
        ['supplier_code' => '04', 'category_code' => '0444', 'product_code' => '044444', 'product_name' => 'Gshock'],
        ['supplier_code' => '04', 'category_code' => '0445', 'product_code' => '044445', 'product_name' => 'Rolex'],
        ['supplier_code' => '05', 'category_code' => '0555', 'product_code' => '055555', 'product_name' => 'Iphone'],
        ['supplier_code' => '05', 'category_code' => '0556', 'product_code' => '055556',
            'product_name' => 'Samsung']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
          $table->dropForeign('products_supplier_code_foreign');
          $table->dropForeign('products_category_code_foreign');
        });
        Schema::drop('products');    }
};
