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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('group_category')->default(0);
            $table->string('name');
            $table->string('groupdate')->nullable();
            $table->string('grouptime')->nullable();
            $table->string('placename')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
