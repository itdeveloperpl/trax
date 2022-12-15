<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('groups')) {
            Schema::create('groups', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('name');
                $table->unique('name');
            });
        }

        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('name');
                $table->unique('name');
            });
        }

        if (!Schema::hasTable('group_roles')) {
            Schema::create('group_roles', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('group_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('group_id')->references('id')->on('groups');
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }

        if (!Schema::hasTable('user_group')) {
            Schema::create('user_group', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('group_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('group_id')->references('id')->on('groups');
            });
        }


        DB::table('roles')->insert([
            [
                'name' => 'CarView',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'CarCreate',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'CarUpdate',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'CarDelete',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'TripView',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'TripCreate',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'TripUpdate',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
            [
                'name' => 'TripDelete',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],

        ]);


        DB::table('groups')->insert([
            [
                'name' => 'Administrators',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ],
        ]);

        DB::table('group_roles')->insert([
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'CarView')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'CarCreate')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'CarUpdate')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'CarDelete')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'TripView')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'TripCreate')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'TripUpdate')->value('id'),
            ],
            [
                'group_id' => DB::table('groups')->where('name', 'Administrators')->value('id'),
                'role_id' => DB::table('roles')->where('name', 'TripDelete')->value('id'),
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('group_roles');
        Schema::dropIfExists('user_group');
    }
}
