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
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('image')->nullable();
            $table->string('mobil_image')->nullable();
            $table->string('name')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();

            $table->unique(['slider_id', 'locale']);
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_translations');
    }
};
