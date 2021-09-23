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
            $table->string('mobile')->nullable();
            $table->string('img_profile')->nullable();
            $table->string('job_function')->nullable();

            $table->string('country')->nullable();
            $table->string('province')->nullable();

            $table->string('institution_name')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('visitor_type')->nullable();
            $table->json('product_interest')->nullable();
            $table->json('visit_purpose')->nullable();
            $table->string('member_sehat_ri')->nullable();
            $table->boolean('allow_share_info')->default(false);
            $table->string('role', 20)->nullable();

            // exhibitor only
            $table->text('ala_carte')->nullable();
            $table->text('additional_remarks')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_video_url')->nullable();
            $table->text('company_description')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string('business_nature')->nullable();

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
