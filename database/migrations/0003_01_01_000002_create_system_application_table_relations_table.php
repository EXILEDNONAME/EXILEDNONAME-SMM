<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('system_application_table_relations', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->timestamp('date')->nullable();
      $table->string('name');
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->integer('created_by')->nullable()->default('0');
      $table->integer('id_general')->unsigned();
      $table->foreign('id_general')->references('id')->on('system_application_table_generals')->onDelete('restrict')->onUpdate('restrict');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('system_application_table_relations');
  }

};
