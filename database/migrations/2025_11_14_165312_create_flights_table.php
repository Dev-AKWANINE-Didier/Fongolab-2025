<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();

            // les colonnes 
            $table->unique("name");
            $table->foreignId("user_id");
            $table->string("airline");
            $table->enum('role',['user','admin']);
            $table->boolean("status")->nullable();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};