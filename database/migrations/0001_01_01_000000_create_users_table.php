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
        Schema::create('employee', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('password');
            $table->tinyInteger('level')->default(1);
        });


        Schema::create('merchant', function (Blueprint $table) {
            $table->bigIncrements('merchant_id')->primary();
            $table->string('name');
            $table->string('abbr'); // abbreviation
        });


        Schema::create('entry', function (Blueprint $table) {
            $table->bigIncrements('entry_id')->primary();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table->string('abbr'); // abbreviation
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('verified_at')->useCurrent();
            
            $table->foreign('user_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreign('merchant_id')->references('merchant_id')->on('merchant')->onDelete('cascade');
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
        Schema::dropIfExists('sessions');
    }
};
