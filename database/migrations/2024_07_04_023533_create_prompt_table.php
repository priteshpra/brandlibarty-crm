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
        Schema::create('prompts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prompt', 100);
            $table->string('language', 100);
            $table->string('tone_of_voice', 250);
            $table->string('act_as', 150);
            $table->integer('character')->unsigned();
            $table->text('description');
            $table->boolean('status')->default('1');
            $table->integer('createdBy')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('prompts', function (Blueprint $table) {
            //
        });
    }
};
