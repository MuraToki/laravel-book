<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('books', function (Blueprint $table) {
                $table->bigIncrements('id', true);
                $table->string('title', 100);
                $table->longText('content');
                $table->timestamp('updated_at')->useCurrent()->nullable();
                $table->timestamp('created_at')->useCurrent()->nullable();
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
