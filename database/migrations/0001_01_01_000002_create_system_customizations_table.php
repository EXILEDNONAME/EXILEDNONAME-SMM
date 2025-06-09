<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('system_customizations', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sticky_toolbar')->default(1);
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExists('system_customizations');
  }

};
