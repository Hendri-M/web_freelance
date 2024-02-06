<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysTaglines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taglines', function (Blueprint $table) {
            $table->foreign('services_id', 'fk_taglines_to_services')
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
        Schema::table('taglines', function (Blueprint $table) {
            $table->dropIndex('fk_taglines_to_services');
        });
    }
}
