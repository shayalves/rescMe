<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactEmailsAndPhonesTables extends Migration
{
    public function up()
    {
        Schema::create('contact_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->string('email');
            $table->boolean('main')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contact_phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade');
            $table->string('international_code');
            $table->string('phone_number');
            $table->boolean('main')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_phones');
        Schema::dropIfExists('contact_emails');
    }
}
?>