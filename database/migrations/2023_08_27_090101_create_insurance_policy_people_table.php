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
        Schema::create('insurance_policy_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_policy_data_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('document_type_id');
            $table->string('document_number');
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_policy_people');
    }
};
