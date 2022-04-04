<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->longText('desc')->nullable();
            $table->string('pass')->nullable();
            $table->string('yesno')->nullable();
            $table->string('multiplechoice')->nullable();
            $table->boolean('switch')->default(0)->nullable();
            $table->integer('counter')->nullable();
            $table->float('bignum', 15, 2)->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->date('birthday')->nullable();
            $table->datetime('birthtime')->nullable();
            $table->time('alarm')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
