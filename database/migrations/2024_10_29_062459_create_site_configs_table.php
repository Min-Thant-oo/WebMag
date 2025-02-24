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
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('google');
            $table->string('github');
            $table->longText('policy');
            $table->longText('about');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->text('contact_message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_configs');
    }
};
