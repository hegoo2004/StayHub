<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_title')->nullable(); 
            $table->string('image')->nullable(); 
            $table->longText('descrtiption')->nullable(); 
            $table->string('price')->nullable(); 
            $table->string('wifi')->default('yes'); 
            $table->string('room_type')->nullable(); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
