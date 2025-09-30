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
            $table->string('nama');
            $table->string('kode_mentor')->nullable()->unique(); 
            $table->string(column: 'email')->unique();
            // $table->integer('nomor_hp');
            // $table->integer('nomor_hp')->nullable();
            $table->integer('nomor_hp')->nullable(false);

            // $table->string('jenis_kelamin'); // Tidak perlu default
            $table->string('jenis_kelamin')->nullable(false);


            // $table->string('umur');
            $table->integer('umur');

            $table->string('role')->default('student');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image_path')->nullable();
            $table->string('specialty')->nullable();
            $table->string('description')->nullable();
            $table->string('university')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::table('users', function (Blueprint $table) {
            $table->string('nomor_hp')->nullable()->change();
            $table->string('jenis_kelamin')->nullable()->change();
            $table->integer('umur')->nullable()->change();


        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
