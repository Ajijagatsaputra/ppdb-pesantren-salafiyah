<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('school_origin');
            $table->date('birth_date');
            $table->string('nisn')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('document_path')->nullable();
            $table->enum('payment_status', ['pending', 'gagal', 'sukses'])->default('pending');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
