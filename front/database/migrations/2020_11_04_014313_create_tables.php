<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
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
            $table->string("name",150);
            $table->string("email",150);
            $table->string("password",55);
            $table->date('lastAnswer')->nullable(true)->default(NULL);
            $table->enum("rol",["1","2"]);  //1 para admin, 2 para user
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string("question",500);
            $table->enum("question_type",["open","yes-no","scale"]);
        });

        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->date("answer_date");
            $table->foreignId('user_id')->references("id")->on("users");
            $table->foreignId('question_id')->references("id")->on("questions");
            $table->text("answer");
            $table->index("user_id");
            $table->index("question_id");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('question');
        Schema::dropIfExists('user_answer');
    }
}
