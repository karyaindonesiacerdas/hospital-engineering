<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('institution_name')->nullable();
            $table->string('job_function')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('visitor_type')->nullable();
            $table->string('member_sehat_ri')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_web')->nullable();
            $table->json('business_type')->nullable();
            $table->json('business_sector')->nullable();
            // $table->json('web_ads_type')->nullable();
            // $table->json('mobile_ads_type')->nullable();
            // $table->json('opening_ads_type')->nullable();
            // $table->json('seminar_ads_type')->nullable();
            // $table->json('prouduct_exhibition_ads_type')->nullable();
            // $table->json('consultancy_ads_type')->nullable();
            // $table->json('closing_ads_type')->nullable();
            $table->text('additional_remaks')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_video_url')->nullable();
            $table->text('company_description')->nullable();
            $table->string('role', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
