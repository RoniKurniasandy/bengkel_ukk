<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

public function up(): void
{
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // id default Laravel
        $table->string('nama'); // ganti dari 'name' ke 'nama'
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->string('role')->default('pelanggan');
        $table->rememberToken();
        $table->timestamps();
    });
}
};