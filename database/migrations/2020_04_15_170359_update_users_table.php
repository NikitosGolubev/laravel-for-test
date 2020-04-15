<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('avatar')->default('users/default.jpg');
            $table->string('phone_number')->unique();
            $table->unsignedTinyInteger('gender')->default(0);
            $table->boolean('mailing_accepted')->default(false);
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('avatar');
            $table->dropColumn('phone_number');
            $table->dropColumn('gender');
            $table->dropColumn('mailing_accepted');
        });
    }
}
