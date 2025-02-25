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
        Schema::create('custom_fields', function (Blueprint $table): void {
            $table->id();
            $table->unsignedTinyInteger('type');
            $table->string('name');
            $table->boolean('is_system')->default(false);
            $table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('custom_field_model', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('custom_field_id');
            $table->unsignedBigInteger('model_id');
            $table->string('value');
            $table->timestamps();

            $table->index(['custom_field_id', 'model_id', 'value'], 'field_value_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields');
        Schema::dropIfExists('custom_field_model');
    }
};
