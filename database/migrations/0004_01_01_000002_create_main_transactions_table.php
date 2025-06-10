<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('main_transactions', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_user')->unsigned();
      $table->integer('id_product')->unsigned();
      $table->integer('id_order')->nullable();
      $table->string('target');
      $table->integer('quantity');
      $table->decimal('price', 11,2);
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->integer('created_by')->nullable()->default('0');
      $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
      $table->foreign('id_product')->references('id')->on('main_products')->onDelete('restrict')->onUpdate('restrict');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('main_transactions');
  }

};
