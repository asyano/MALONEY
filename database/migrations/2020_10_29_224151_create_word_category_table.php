<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); //ユーザーID
            $table->string('cate_1_name'); //カテゴリ名１
            $table->string('cate_2_name'); //カテゴリ名２
            $table->string('cate_3_name'); //カテゴリ名３
            $table->string('cate_4_name'); //カテゴリ名４
            $table->timestamps();
            
             // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_category');
    }
}
