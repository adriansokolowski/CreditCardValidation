<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use illuminate\support\Facades\DB;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->integer('charged_amount');
            $table->date('date', 0);
            $table->dateTime('updated_at', 0)->nullable();	
            $table->dateTime('created_at', 0);	
            
            $table->foreign('subscription_id')
                ->references('id')
                ->on('subscriptions')
                ->onDelete('cascade');
        });

        DB::table('payments')->insert(
        [
                'subscription_id' => 2,
                'charged_amount' => 2400,
                'date' => '2017-04-01',
                'updated_at' => null,
                'created_at' => NOW()
        ]);
        DB::table('payments')->insert(
        [
                'subscription_id' => 2,
                'charged_amount' => 1700,
                'date' => '2017-05-01',
                'updated_at' => null,
                'created_at' => NOW()
        ]);
        DB::table('payments')->insert(
        [
                'subscription_id' => 3,
                'charged_amount' => 3600,
                'date' => '2017-04-15',
                'updated_at' => null,
                'created_at' => NOW()
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
