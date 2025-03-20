<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ✅ Reference to the logged-in user
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->text('address');
            $table->string('number');
            $table->date('appointment_date');
            $table->enum('type_of_action', ['brace', 'teeth cleaning', 'root canal', 'pasta']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
