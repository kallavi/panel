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
        Schema::create('page_videos', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id');
            $table->string('cover')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('page_videos');
    }
};
