<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysAdvantageServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advantage_services', function (Blueprint $table) {
            $table->foreign('services_id', 'fk_advantage_services_to_services')
                ->references('id')->on('services')
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
        Schema::table('advantage_services', function (Blueprint $table) {
            $table->dropIndex('fk_advantage_services_to_services');
        });
    }
}
