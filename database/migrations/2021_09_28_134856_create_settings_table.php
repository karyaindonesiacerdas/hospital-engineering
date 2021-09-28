<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('youtube_link')->nullable();
            $table->string('zoom_link')->nullable();
            $table->string('zoom_business_link')->nullable();
            $table->string('webinar_link')->nullable();
            $table->string('ads1_link')->nullable();
            $table->string('ads2_link')->nullable();
            $table->string('is_chat')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
