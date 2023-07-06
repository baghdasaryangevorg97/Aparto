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
        Schema::create('config_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('communityId');
            $table->string('addressId')->nullable();
            $table->string('am')->nullable();
            $table->string('ru')->nullable();
            $table->string('en')->nullable();
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
        Schema::dropIfExists('config_addresses');
    }
};
