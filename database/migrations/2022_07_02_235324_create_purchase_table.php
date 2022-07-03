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
        Schema::create('purchase', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('desig_id')->unsigned()->nullable();
            $table->string('last_name',50);
            $table->string('first_name',50);
            $table->string('middle_name',50);
            $table->char('suffix_name',5);
            $table->char('supplier_code',2);
            $table->char('category_code',4);
            $table->char('product_code',6);
            $table->date('created_date')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('desig_id')->references('id')->on('designation');
            $table->foreign('supplier_code')->references('supplier_code')->on('supplier');
            $table->foreign('category_code')->references('category_code')->on('category');
            $table->foreign('product_code')->references('product_code')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('purchase', function($table) {  
              $table->dropForeign('purchase_desig_id_foreign');  
              $table->dropForeign('purchase_supplier_code_foreign');
              $table->dropForeign('purchase_category_code_foreign');
              $table->dropForeign('purchase_product_code_foreign');
        });
        Schema::dropIfExists('purchase');
    }
};
