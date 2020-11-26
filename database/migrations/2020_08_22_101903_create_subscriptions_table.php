<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->date('service_start1');
            $table->date('service_start2')->nullable();
            $table->date('service_expiration1');
            $table->date('service_expiration2')->nullable();
            $table->date('contract_start');
            $table->date('contract_expiration');
            $table->integer('state')->default(1);
            $table->string('username1');
            $table->string('password1');
            $table->string('username2')->nullable();
            $table->string('password2')->nullable();
            $table->integer('periodicity')->default(1);
            $table->string('cost');
            $table->string('country1');
            $table->string('country2')->nullable();
            $table->string('postal_code1');
            $table->string('postal_code2')->nullable();
            $table->string('language');
            $table->longText('devices')->nullable();
            $table->longText('observations')->nullable();
            $table->bigInteger('credit_card1');
            $table->string('card_date1');
            $table->integer('card_code1');
            $table->string('acc_owner1')->nullable();
            $table->bigInteger('credit_card2')->nullable();
            $table->string('card_date2')->nullable();
            $table->integer('card_code2')->nullable();
            $table->string('acc_owner2')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
