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
        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('school_type_id');
            $table->string('npsn');
            $table->text('address');
            $table->string('postal_code');
            $table->string('name');
            $table->string('telp_number');
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('school_type_id')
                ->references('id')
                ->on('school_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
