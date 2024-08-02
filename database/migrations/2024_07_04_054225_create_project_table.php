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
        Schema::create('project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('projectName', 100);
            $table->string('category', 100);
            $table->string('activationCode', 200);
            $table->string('subcategory', 250)->default(NULL);
            $table->integer('promptID');
            $table->boolean('isConnected')->default(0);
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
        Schema::table('project', function (Blueprint $table) {
            //
        });
    }
};
