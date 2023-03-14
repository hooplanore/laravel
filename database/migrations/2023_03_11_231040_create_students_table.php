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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kana');
            $table->string('email');
            $table->string('password');
            $table->integer('zip_code');
            $table->string('address1');
            $table->string('address2');
            $table->string('tel');
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->date('joindate');
            $table->integer('amount_category');
            $table->tinyInteger('payment');
            $table->string('introducer')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('campaign')->nullable();
            $table->text('memo')->nullable();
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
        Schema::dropIfExists('students');
    }
};
