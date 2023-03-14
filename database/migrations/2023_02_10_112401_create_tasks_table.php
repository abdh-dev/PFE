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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description")->default("");
            $table->smallInteger("status")->default(0);
            $table->smallInteger("priority")->default(0);
            $table->decimal("estimated_time")->default(0);
            $table->integer("bonus")->default(0);
            $table->integer("penalty")->default(0);
            $table->date("start_date");
            $table->date("due_date");
            $table->date("completion_date")->nullable();
            $table->json("custom_fields")->default("[]");

            $table->foreignId("created_by")->constrained("users");
            $table->foreignId("updated_by")->constrained("users");
            $table->foreignId("depends_on")->constrained("tasks");
            $table->foreignId("subtask_of")->constrained("tasks");
            $table->foreignId("phase_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void {
        Schema::dropIfExists('tasks');
    }
};
