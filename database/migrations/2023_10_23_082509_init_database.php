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
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->string('icon')->nullable();
        });

        Schema::create('characteristic', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
        });

        Schema::create('characteristic_value', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->foreignId('characteristic_id')->constrained('characteristic')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('row', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
        });

        Schema::create('row_value', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->foreignId('row_id')->constrained('row')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('period', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
        });

        Schema::create('period_value', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->foreignId('period_id')->constrained('period')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
        });

        Schema::create('indicator', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
            $table->foreignId('subject_id')->constrained('subject')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('characteristic_id')->nullable()->constrained('characteristic')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('period_id')->constrained('period')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('row_id')->constrained('row')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('unit_id')->nullable()->constrained('unit')->onUpdate('cascade')->onDelete('cascade');
            $table->string('source')->nullable();
            $table->integer('view')->default(0);
            $table->timestamps();
        });

        Schema::create('year', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name');
        });

        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('visitor', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
        });

        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->string('sender');
            $table->string('contact_number');
            $table->string('email');
            $table->string('message');
            $table->boolean('has_red')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
