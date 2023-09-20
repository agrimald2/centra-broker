<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incident_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_id');
            $table->date('incident_date');
            $table->unsignedBigInteger('driver_id');
            $table->string('place');
            $table->string('police_station')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->text('summary')->nullable();
            $table->boolean('have_police_conclusion')->default(0);
            $table->text('police_conclusion')->nullable();
            $table->unsignedBigInteger('workshop_id')->nullable();
            $table->date('workshop_entrance_date')->nullable();
            $table->date('budget_approval_date')->nullable();
            $table->unsignedBigInteger('executive_id')->nullable();
            $table->boolean('is_bank_endorsed')->default(0);
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('deductible')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_histories');
    }
};
