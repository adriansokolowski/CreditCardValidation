<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


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
            $table->unsignedBigInteger('user_id');
            $table->integer('subscription_shipping_address_id')->nullable();
            $table->integer('subscription_billing_address_id');
            $table->string('status')->default('new');
            $table->integer('subscription_pack_id');
            $table->dateTime('started_at', 0)->nullable();	
            $table->dateTime('created_at', 0)->nullable();	
            $table->dateTime('updated_at', 0);	

            
        });

        DB::table('subscriptions')->insert(
        [
            'user_id' => 1,
            'subscription_shipping_address_id' => 1,
            'subscription_billing_address_id' => 1,
            'status' => 'new',
            'subscription_pack_id' => 5,
            'started_at' => null,
            'created_at' => null,
            'updated_at' => NOW()
        ]);
        DB::table('subscriptions')->insert(
        [
            'user_id' => 2,
            'subscription_shipping_address_id' => 2,
            'subscription_billing_address_id' => 2,
            'status' => 'active',
            'subscription_pack_id' => 2,
            'started_at' => '2017-04-01',
            'created_at' => null,
            'updated_at' => NOW()
        ]);
        DB::table('subscriptions')->insert(
        [
            'user_id' => 3,
            'subscription_shipping_address_id' => 3,
            'subscription_billing_address_id' => 3,
            'status' => 'active',
            'subscription_pack_id' => 7,
            'started_at' => '2017-04-15',
            'created_at' => null,
            'updated_at' => NOW()
        ]);
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
