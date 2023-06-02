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
  public function up(): void {
    Schema::create('attachments', function (Blueprint $table) {
      $table->id();
      $table->string("path");
      $table->string("name");
      $table->string("size");
      $table->string("type");
      $table->string('extension');

      $table->morphs("attachable");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void {
    Schema::dropIfExists('attachments');
  }
};
