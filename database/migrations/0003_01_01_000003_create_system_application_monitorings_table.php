<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  public function up(): void {
    Schema::create('system_application_monitorings', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamp('date_start')->nullable();
      $table->timestamp('date_end')->nullable();
      $table->timestamp('date')->nullable();
      $table->string('name');
      $table->string('ip_address');
      $table->string('mac_address')->nullable()->default('00:00:00:00:00:00');
      $table->integer('port')->nullable()->default('80');
      $table->string('device')->nullable();
      $table->text('description')->nullable();
      $table->integer('active')->default(1);
      $table->integer('status')->default(1);
      $table->integer('created_by')->nullable()->default('0');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  public function down(): void {
    Schema::dropIfExists('system_application_monitorings');
  }

};
