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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->string('firstname');
            $table->string('middle');
            $table->string('lastname');
            $table->string('address');
            $table->string('city');
            $table->smallInteger('mobile');
            $table->string('email', 100);
            $table->timestamp('dateofbirth');
            $table->tinyInteger('gender');
            $table->tinyInteger('maritalstatus');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
