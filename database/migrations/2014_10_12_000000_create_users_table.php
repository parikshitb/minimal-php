<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'parikshit',
                'email' => 'parixit23+artisan@gmail.com',
                //hashing algorithm = bcrypt rounds = 10. 
                //Ref: config/hashing.php
                'password' => '$2y$10$dgiwV6OrD3W4I.ZCUiQ27efa4eBk6xUpZXvfHuNI7/.h0YFZuc7Va',
            ],
            [
                'name' => 'abc',
                'email' => 'abc@def.com',
                'password' => '$2y$10$mZdWA38wAynqUYt.S9XtsuvTH7XC/xIDblR2S9V1QTGtTjSvluMnS',
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
        Schema::dropIfExists('users');
    }
};
