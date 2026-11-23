<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('software_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('software_title');
            $table->text('about_us');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('favicon_title');
            $table->string('copyright_text')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software_settings');
    }
};
