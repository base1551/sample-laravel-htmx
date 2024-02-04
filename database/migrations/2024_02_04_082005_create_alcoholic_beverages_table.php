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
        Schema::create('alcoholic_beverages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('お酒の名前');
            $table->string('alcohol_content')->comment('アルコール度数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alcoholic_beverages');
    }
};
