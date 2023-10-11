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
        Schema::create('insurance_policy_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_policy_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('insurance_policies_status_id')->nullable();
            $table->unsignedBigInteger('insurance_company_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('comission_type_id')->default(1);
            $table->decimal('comission', 8, 2)->nullable();
            $table->integer('number_of_installments')->nullable();
            $table->decimal('risk_rate', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_policy_data');
    }
};
