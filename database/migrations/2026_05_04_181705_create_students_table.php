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
    Schema::create('students', function (Blueprint $table) {
        $table->id();

        $table->string('std_name');
        $table->string('std_roll');

        $table->unsignedBigInteger('std_class_id');
        $table->unsignedBigInteger('std_section_id');
        $table->unsignedBigInteger('std_session_id');

        $table->string('std_phn')->nullable();
        $table->enum('std_status', ['Active', 'Inactive'])->default('Active');

        $table->timestamps();

        // Foreign keys (optional but recommended)
        $table->foreign('std_class_id')->references('id')->on('school_classes')->onDelete('cascade');
        $table->foreign('std_section_id')->references('id')->on('sections')->onDelete('cascade');
        $table->foreign('std_session_id')->references('id')->on('session_years')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
