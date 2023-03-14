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
        Schema::create('task_histories', function (Blueprint $table) {
            $table->id();
            $table->string("field_name");
            $table->string("old_value")->nullable();
            $table->string("new_value");

            $table->foreignId("task_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('task_histories');
    }
};
