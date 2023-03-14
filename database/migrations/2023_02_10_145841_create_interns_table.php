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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string("school");
            $table->timestamp("start_date");
            $table->timestamp("end_date")->nullable();

            $table->foreignId("user_id")->constrained();
            $table->foreignId("employee_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('interns');
    }
};
