<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('e_mail')->nullable();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('favicon')->nullable();
            $table->string('analytics')->nullable();
            $table->string('recaptcha_key')->nullable();
            $table->string('recaptcha_secret_key')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('bulletin_mail')->nullable();
            $table->string('request_mail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
