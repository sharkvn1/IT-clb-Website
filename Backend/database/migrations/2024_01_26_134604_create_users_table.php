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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('studentID', 10);
            $table->string('mail', 50);
            $table->string('username', 20);
            $table->string('password')->default('00000');
            $table->string('name', 20);
            $table->string('avatarPath', 50)->nullable();
            $table->date('birthday');
            $table->date('joinDate');
            $table->unsignedBigInteger('majorID');
            $table->unsignedBigInteger('courseID');
            $table->string('phone', 10)->nullable();
            $table->smallInteger('active', false)->default('0');
            $table->json('socialAccount')->nullable();
            $table->smallInteger('role', false)->default('0');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('majorID')->references('id')->on('majors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('courseID')->references('id')->on('courses')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
