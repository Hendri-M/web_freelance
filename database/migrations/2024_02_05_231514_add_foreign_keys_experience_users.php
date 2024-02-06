<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysExperienceUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experience_users', function (Blueprint $table) {
            $table->foreign('details_user_id', 'fk_experience_users_to_detail_users')
                ->references('id')->on('detail_users')
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
        Schema::table('experience_users', function (Blueprint $table) {
            $table->dropForeign('fk_experience_users_to_detail_users');
        });
    }
}
