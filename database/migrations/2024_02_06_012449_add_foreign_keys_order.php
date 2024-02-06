<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->foreign('buyer_id', 'fk_order_buyer_to_users')
                ->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('freelancer_id', 'fk_oreder_freelancer_to_users')
                ->references('id')->on('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('services_id', 'fk_oreder_to_services')
                ->references('id')->on('services')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('order_status_id', 'fk_order_to_order_status')
                ->references('id')->on('order_status')
                ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropIndex('fk_order_buyer_to_users');
            $table->dropIndex('fk_oreder_freelancer_to_users');
            $table->dropIndex('fk_oreder_services_to_services');
            $table->dropIndex('fk_order_to_order_status');
        });
    }
}
